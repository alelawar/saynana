<section class="px-6 lg:px-10 max-w-7xl mx-auto" >
    <div class="">
        <div class="flex flex-col-reverse justify-between lg:flex-row gap-8 md:gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-4 xl:space-y-6 w-full lg:max-w-md">
                <!-- Header Badge -->
                <div class="flex justify-center w-full md:justify-start">
                    <span class="px-4 py-2 bg-[#57352C] text-white rounded-full text-sm md:text-lg">
                        kenapa memilih kami?
                    </span>
                </div>

                <!-- Main Heading -->
                <h2 class="text-2xl md:text-3xl lg:text-5xl sour-gummy leading-tight text-center md:text-left">
                    Renyah Alami, Sehat di Setiap Gigitan
                </h2>

                <!-- Description -->
                <p class="opacity-75 text-sm md:text-md leading-relaxed text-center md:text-left">
                    Diolah dengan minyak berkualitas dan tanpa bahan pengawet,
                    camilan ini memberikan rasa manis alami dari pisang pilihan,
                    tanpa tambahan pemanis buatan yang berlebihan. Setiap irisan
                    pisang digoreng dengan suhu terkontrol untuk menjaga kandungan
                    gizinya tetap optimal, sehingga Anda bisa menikmati kerenyahan
                    yang memuaskan sekaligus manfaat alami yang terkandung di
                    dalamnya.
                </p>

                <!-- CTA Button -->
                <div class="pt-2 md:pt-4 flex justify-center md:justify-start">
                    <a href="#product"
                        class="bg-[#57352C] hover:bg-amber-900 text-white font-semibold px-6 md:px-8 py-2 md:py-3 rounded-lg transition-colors duration-300">
                        Dapatkan sekarang!
                    </a >
                </div>
            </div>

            <img src="{{ asset('img/product/combination-flavor.png') }}" alt="Combination flavor"
                class="hidden xl:block absolute translate-x-110 w-64 md:w-76 h-auto object-cover" />

            <!-- Right Content - Product Image and Features -->
            <div class="relative w-full xl:flex-1 ">
                <!-- Background Image Placeholder -->
                <div
                    class="relative -z-10 inset-0 right-0 rounded-2xl md:pl-8 lg:pl-16 md:pr-8 w-full min-h-[300px] md:min-h-[500px] lg:min-h-[760px] flex items-center justify-center md:justify-end  bg-cover bg-center before:absolute before:inset-0 before:bg-black/20 before:rounded-2xl" style="background-image: url({{ asset('img/bg-banana.jpg') }})">
                    <!-- Feature Cards -->
                    <div class="flex flex-col justify-center xl:justify-end relative z-20 text-white w-full xl:w-auto">
                        <!-- Feature 1 -->
                        <div class="p-3 md:p-4 border-b-1">
                            <div class="flex items-center space-x-3 md:space-x-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <i class="bi bi-check text-white text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-sm md:text-base">
                                        100% halal, terjamin dan bersertifikat
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="p-3 md:p-4 border-b-1">
                            <div class="flex items-center space-x-3 md:space-x-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-pink-500 rounded-full flex items-center justify-center">
                                    <i class="bi bi-flask text-white text-sm md:text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-sm md:text-base">
                                        tanpa bahan pengawet
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="p-3 md:p-4 border-b-1">
                            <div class="flex items-center space-x-3 md:space-x-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="bi bi-clock text-white text-sm md:text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-sm md:text-base">
                                        tahan selama 4 bulan
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <!-- Feature 4 -->
                        <div class="p-3 md:p-4 border-b-1">
                            <div class="flex items-center space-x-3 md:space-x-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-purple-500 rounded-full flex items-center justify-center">
                                    <i class="bi bi-truck text-white text-sm md:text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-sm md:text-base">
                                        dikirim keseluruh Indonesia
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>