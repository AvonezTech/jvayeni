<footer class="bg-brand text-[#f6f5f0] pt-16 pb-8 border-t border-brand">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-x-4 gap-y-10 md:gap-10 lg:gap-16">
            
            <div class="col-span-2 md:col-span-1 flex flex-col items-start">
                <h2 class="font-heading text-3xl font-bold uppercase tracking-wide text-white mb-4">
                    Y'<span class="text-white/60">ALL</span>
                </h2>
                <p class="text-white/80 text-sm font-medium leading-relaxed mb-6 max-w-sm">
                    Good food fuels great minds. Serving the best, fresh, and affordable meals for our campus family every single day.
                </p>
            </div>

            <div>
                <h3 class="font-heading text-xl font-bold uppercase text-white mb-4 tracking-wide">Quick Links</h3>
                <ul class="space-y-3 text-sm font-medium text-white/80">
                    <li><a href="{{ route('menu') }}" class="hover:text-white transition-colors">Today's Menu</a></li>
                    <li><a href="{{ route('menu') }}" class="hover:text-white transition-colors">Browse Categories</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-heading text-xl font-bold uppercase text-white mb-4 tracking-wide">Visit Us</h3>
                <ul class="space-y-3 text-sm font-medium text-white/80">
                    
                    <li>
                        <a href="https://maps.google.com/?q=Kathmandu+Business+Campus" target="_blank" rel="noopener noreferrer" class="flex items-start gap-2 hover:text-white transition-colors duration-200 group">
                            <svg class="w-5 h-5 mt-0.5 text-white/60 group-hover:text-white transition-colors duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Kathmandu Business Campus</span>
                        </a>
                    </li>
                    
                    <!-- Updated Contact: Phone Number -->
                    <li>
                        <a href="tel:+9779766481563" class="flex items-start gap-2 hover:text-white transition-colors duration-200 group">
                            <svg class="w-5 h-5 mt-0.5 text-white/60 group-hover:text-white transition-colors duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="underline underline-offset-4 decoration-white/20 group-hover:decoration-white transition-colors duration-200">+977-9766481563</span>
                        </a>
                    </li>
                    
                </ul>
            </div>

        </div>

        <div class="border-t border-white/20 mt-12 lg:mt-8 pt-6 lg:pt-4 flex flex-col md:flex-row items-center justify-between text-xs font-medium text-white/60">
            <p class="w-full md:w-auto text-center md:text-left order-1">© 2026 Campus Food. All rights reserved.</p>
            
            <!-- Highlighted Center Credit -->
            <div class="my-4 md:my-0 text-white font-semibold order-2 text-center">
                Made by <a href="https://techzenova.com/" target="_blank" rel="noopener noreferrer" class="underline underline-offset-4 decoration-white/40 hover:decoration-white transition-colors">Zenova</a>
            </div>
            
            <div class="flex gap-4 w-full md:w-auto justify-center md:justify-end order-3">
                <a href="privacy" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="terms" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>