<x-layout>

    <style>
        .reveal {
            opacity: 0;
            transform: translateY(15px);
            transition: opacity 2.0s cubic-bezier(0.16, 1, 0.3, 1), transform 2.0s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <!-- Full-screen canvas wrapper -->
    <div class="w-full min-h-screen bg-[#F8F6F1] text-stone-900 font-sans antialiased overflow-x-hidden flex flex-col justify-start">

        <!-- Page Header - Matches the 7xl max-width scale -->
        <header class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-6 md:pt-20 md:pb-10 lg:pt-24 lg:pb-12 reveal">
            <div class="w-full max-w-4xl">
                <h1 class="font-heading text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold uppercase tracking-tight text-stone-900 mb-3 sm:mb-4">
                    Terms of <span class="text-brand">Service</span>
                </h1>
                <p class="text-stone-500 text-xs sm:text-sm font-medium tracking-wide">Last updated: July 2026</p>
            </div>
        </header>

        <!-- Main Content Body - White background card container upgraded to max-w-7xl -->
        <main class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 lg:pb-32 flex-grow">
            <div class="w-full bg-white border border-[#ECE5DB] rounded-xl sm:rounded-2xl p-5 sm:p-8 md:p-12 shadow-sm space-y-6 sm:space-y-8 text-sm sm:text-base leading-relaxed text-stone-700 reveal" style="transition-delay: 100ms;">
                
                <section>
                    <p class="font-medium text-stone-800">
                        By accessing and using the <strong class="text-stone-900 font-bold">Campus Food</strong> menu platform, you agree to be bound by these Terms of Service. If you do not agree to all of these terms, please refrain from using our interface or system platforms.
                    </p>
                </section>

                <hr class="border-stone-200/60" />

                <section>
                    <h2 class="font-heading text-lg sm:text-xl md:text-2xl font-bold uppercase text-stone-900 mb-3 sm:mb-4 tracking-wide">1. Acceptance of Terms</h2>
                    <p>
                        By accessing and using the <strong class="text-stone-900">Campus Food</strong> menu platform, you agree to be bound by these Terms of Service. If you do not agree to all of these terms, please refrain from using our interface or system platforms.
                    </p>
                </section>

                <hr class="border-stone-200/60" />

                <section>
                    <h2 class="font-heading text-lg sm:text-xl md:text-2xl font-bold uppercase text-stone-900 mb-3 sm:mb-4 tracking-wide">2. Service Eligibility and Scope</h2>
                    <p>
                        This service is tailored specifically for the community, faculty, staff, and students of <strong class="text-stone-900">Kathmandu Business Campus (KBC)</strong>. Orders submitted via this application are strictly intended for on-site distribution at our designated ground-floor location or approved dining spaces.
                    </p>
                </section>

                <hr class="border-stone-200/60" />

                <section>
                    <h2 class="font-heading text-lg sm:text-xl md:text-2xl font-bold uppercase text-stone-900 mb-3 sm:mb-4 tracking-wide">3. Orders, Prices, and Availability</h2>
                    <ul class="space-y-3 sm:space-y-4 pl-1 sm:pl-2">
                        <li class="flex items-start gap-2 sm:gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand mt-2 shrink-0"></span>
                            <span><strong class="text-stone-900 font-semibold">Menu Variations:</strong> Daily menu compositions, item availability, and specific dish configurations are subject to immediate adjustments depending on stock and operational capacity.</span>
                        </li>
                        <li class="flex items-start gap-2 sm:gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand mt-2 shrink-0"></span>
                            <span><strong class="text-stone-900 font-semibold">Pricing Strategy:</strong> We strive to post accurate pricing. In instances where an interface bug leads to incorrect total values, the standard terminal registry at the physical counter will hold ultimate authority.</span>
                        </li>
                        <li class="flex items-start gap-2 sm:gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand mt-2 shrink-0"></span>
                            <span><strong class="text-stone-900 font-semibold">Cancellations:</strong> Order items are finalized promptly to initiate kitchen prep. Cancellation windows depend entirely on specific timing intervals determined by the kitchen staff.</span>
                        </li>
                    </ul>
                </section>

                <hr class="border-stone-200/60" />

                <section>
                    <h2 class="font-heading text-lg sm:text-xl md:text-2xl font-bold uppercase text-stone-900 mb-3 sm:mb-4 tracking-wide">4. System Integrity & Intellectual Property</h2>
                    <p>
                        The layout, codebase modules, and user flow architectures deployed on this digital platform represent unique configurations developed by <strong class="text-stone-900 font-semibold">Zenova</strong>. Users are explicitly restricted from reverse engineering backend logic, deploying scrapers, or attempting denial-of-service tasks on the hosting layer.
                    </p>
                </section>

                <hr class="border-stone-200/60" />

                <section>
                    <h2 class="font-heading text-lg sm:text-xl md:text-2xl font-bold uppercase text-stone-900 mb-3 sm:mb-4 tracking-wide">5. Limitation of Liability</h2>
                    <p>
                        Campus Food and its technical integration team (Zenova) shall not be held responsible for system downtimes, connection timeouts leading to missing confirmation tokens, or issues with third-party web gateways. Any payment reconciliation conflicts must be settled inside the physical KBC ground-floor canteen office.
                    </p>
                </section>

                <hr class="border-stone-200/60" />

                <section>
                    <h2 class="font-heading text-lg sm:text-xl md:text-2xl font-bold uppercase text-stone-900 mb-3 sm:mb-4 tracking-wide">6. Modifications to Terms</h2>
                    <p>
                        We reserve the right to review and alter these terms continuously to accommodate code enhancements or structural modifications at KBC. Continued interaction with the site following these changes serves as your practical compliance with the updated documentation.
                    </p>
                </section>
                
            </div>
        </main>

    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.02 });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    });
    </script>

</x-layout>