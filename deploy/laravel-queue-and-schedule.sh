#!/bin/bash

set -euo pipefail

# ============================================================
# Laravel cPanel Cron Setup
# Adds scheduler + queue worker cron entries if they do not exist
# ============================================================

# -----------------------------
# CONFIGURATION
# -----------------------------

CPANEL_USER="lcktokha"
PROJECT_PATH="/home/${CPANEL_USER}/public_html"

# Change this if your cPanel uses another PHP path.
# Check using: which php
PHP_BIN="/usr/local/bin/php"

SCHEDULER_LOG="/home/${PROJECT_PATH}/storage/scheduler.log"
QUEUE_LOG="/home/${PROJECT_PATH}/storage/queue.log"

# Queue connection name: database, redis, sqs, etc.
QUEUE_CONNECTION="database"

# -----------------------------
# CRON COMMANDS
# -----------------------------

SCHEDULER_CRON="* * * * * cd ${PROJECT_PATH} && ${PHP_BIN} artisan schedule:run >> ${SCHEDULER_LOG} 2>&1"

QUEUE_CRON="* * * * * cd ${PROJECT_PATH} && ${PHP_BIN} artisan queue:work ${QUEUE_CONNECTION} --stop-when-empty --tries=3 --timeout=300 >> ${QUEUE_LOG} 2>&1"

# -----------------------------
# VALIDATION
# -----------------------------

if [ ! -d "${PROJECT_PATH}" ]; then
    echo "ERROR: Project path does not exist: ${PROJECT_PATH}"
    exit 1
fi

if [ ! -f "${PROJECT_PATH}/artisan" ]; then
    echo "ERROR: artisan file not found in: ${PROJECT_PATH}"
    exit 1
fi

if [ ! -x "${PHP_BIN}" ]; then
    echo "ERROR: PHP binary not found or not executable: ${PHP_BIN}"
    echo "Run this to find PHP:"
    echo "which php"
    exit 1
fi

# -----------------------------
# FUNCTION: Add cron if missing
# -----------------------------

add_cron_if_missing() {
    local cron_line="$1"
    local marker="$2"

    # Get existing crontab. If no crontab exists, continue with empty content.
    existing_cron="$(crontab -l 2>/dev/null || true)"

    if echo "${existing_cron}" | grep -Fq "${marker}"; then
        echo "Cron already exists: ${marker}"
    else
        {
            echo "${existing_cron}"
            echo "${cron_line} # ${marker}"
        } | crontab -

        echo "Added cron: ${marker}"
    fi
}

# -----------------------------
# ADD CRON ENTRIES
# -----------------------------

add_cron_if_missing "${SCHEDULER_CRON}" "laravel-scheduler-${PROJECT_PATH}"
add_cron_if_missing "${QUEUE_CRON}" "laravel-queue-${PROJECT_PATH}"

# -----------------------------
# SHOW CURRENT CRONTAB
# -----------------------------

echo
echo "Current crontab:"
echo "-----------------------------"
crontab -l