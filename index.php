<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Publiccccc</title>
</head>
<style>
      @font-face {
    font-family: 'LucideIcons';
    src: url(https://unpkg.com/lucide-static@latest/font/Lucide.ttf) format('truetype');
  }
</style>
<body class="bg-slate-0">
    <div class="main">
        <div id="global_padding" class="px-4 sm:px-8 md:px-16">
            <div id="global_max_width" class="mx-auto container">

                <!-- SECTION HERO -->

                <section id="hero_section">
                    <div class="pt-20 pb-32">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 lg:gap-0">
                            <div class="hiroes_content_s1 max-w-2xl pt-10">
                                <div class="mb-16">
                                    <h1 class="text-5xl font-bold leading-[1.1] mb-6">Household and Lifestyle Services
                                        to Your Doorstep</h1>
                                    <p class="text-2xl leading-[1.5]">Hiroes offer a wide range of at-home service
                                        categories for your household and lifestyle needs. </p>
                                </div>
                                <div class="flex gap-3">
                                    <a href="#"
                                        class="bg-slate-900 hover:bg-slate-700 border-solid border-1 border-slate-200 text-white text-lg font-medium py-4 px-6 rounded">
                                        <div class="anvil"></div>Find
                                        Services</a>
                                    <a href="#"
                                        class="bg-slate-0 hover:bg-slate-200 border-solid border-1 border-slate-200 text-black text-lg font-medium py-4 px-6 rounded">Learn
                                        More</a>
                                </div>
                            </div>
                            <div class="bg-slate-100 aspect-3/2 object-cover max-w-auto"></div>
                        </div>
                    </div>
                </section>
                <div class="bg-slate-200 w-full h-px"></div>
                
                <!-- SECTION SERVICE AND ACTEGORY-->
                
                <section>
                    <div class="pt-20 pb-32">
                        <div class="hiroes_content_s1 max-w-2xl pt-10">
                            <div>
                                <h2 class="text-4xl font-bold leading-[1.1] mb-4">Explore Services & Prices</h2>
                                <p class="text-2xl leading-[1.5]">Hiroes offer a wide range of at-home service
                                    categories for your household and lifestyle needs.</p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 overflow-x-auto text-nowrap mt-8 mb-16">
                                <a href="#" class="text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 hover:bg-slate-100 text-slate-900 hover:text-slate-50">Available</a>
                                <a href="#" class="text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 hover:bg-slate-100 text-slate-900 hover:text-slate-50">Handyman & Repair</a>
                                <a href="#" class="text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 hover:bg-slate-100 text-slate-900 hover:text-slate-50">Appliances</a>
                                <a href="#" class="text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 hover:bg-slate-100 text-slate-900 hover:text-slate-50">Maintenance</a>
                                <a href="#" class="text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 hover:bg-slate-100 text-slate-900 hover:text-slate-50">Self Care & Wellness</a>
                                <a href="#" class="text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 hover:bg-slate-100 text-slate-900 hover:text-slate-50">Party & Event</a>
                        </div>

                        <!-- FAQ Accordion Container -->
                        <div class="space-y-2">

                            <!-- COMPONENT -->
                            <div class="hiroes-accordion border border-slate-100 rounded-lg overflow-hidden shadow-md p-1 space-y-1">
                                <button
                                    class="w-full flex justify-between items-center p-6 text-slate-900 text-left hover:bg-slate-50 transition"
                                    onclick="toggleAccordion(this)">
                                    <div class="flex flex-col gap-1">
                                        <span id="categoryTitle" class="text-2xl font-medium">What is Hiroes?</span>
                                        <p id="categoryDescription" class="text-xl font-normal">Twinkle Twinkle little star</p>
                                    </div>
                                    <svg class="w-5 h-5 transition-transform transform rotate-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="hidden p-0 bg-slate-0 text-slate-700 grid grid-cols-1 md:grid-cols-2 gap-1">
                                    <div id="serviceCard" class="bg-slate-50 border border-slate-100 flex flex-col rounded-md px-5 py-3">
                                        <div id="serviceName" class="text-xl font-medium">Service Title</div>
                                        <div id="servicePrize">Price</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        function toggleAccordion(button) {
            const answerDiv = button.nextElementSibling;
            const icon = button.querySelector("svg");

            if (answerDiv.classList.contains("hidden")) {
                answerDiv.classList.remove("hidden");
                icon.classList.add("rotate-180");
            } else {
                answerDiv.classList.add("hidden");
                icon.classList.remove("rotate-180");
            }
        }
    </script>
</body>

</html>