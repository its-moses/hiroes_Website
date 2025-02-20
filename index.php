<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css" /> -->
    <!-- <link href="global.css" rel="stylesheet"> -->
    <title>Publiccccc</title>
</head>
<style>
@font-face {
    font-family: 'LucideIcons';
    src: url(https://unpkg.com/lucide-static@latest/font/Lucide.ttf) format('truetype');
}

</style>

<body class="bg-slate-0 position-relative">

    <!-- NAVIGATION BAR -->

    <nav class="fixed top-0 left-0 w-full bg-white z-50">
        <div class="px-4 sm:px-8 md:px-16">
            <div class="mx-auto max-w-7xl">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-4">
                        <a href="index.php" class="text-2xl font-bold text-slate-900">Hiroes</a>
                        <a href="#" class="text-lg text-slate-900">Services</a>
                        <a href="#" class="text-lg text-slate-900">About</a>
                        <a href="#" class="text-lg text-slate-900">Contact</a>
                    </div>
                    <div class="flex gap-3">
                        <a href="#"
                            class="bg-slate-900 hover:bg-slate-700 border-solid border-1 border-slate-200 text-white text-base font-medium py-2 px-4 rounded">
                            <div class="anvil"></div>Find
                            Services
                        </a>
                        <a href="#"
                            class="hidden bg-slate-0 hover:bg-slate-200 border-solid border-1 border-slate-200 text-black text-base font-medium py-2 px-4 rounded">Learn
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="h-16"></div>

    <!-- PAGE CONTENT -->

    <div class="main">
        <div id="global_padding" class="px-4 sm:px-8 md:px-16">
            <div id="global_max_width" class="mx-auto max-w-7xl">

                <!-- SECTION HERO -->

                <section id="hero_section">
                    <div class="pt-20 pb-32">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-20">
                            <div class="hiroes_content_s1 max-w-2xl pt-10">
                                <div class="mb-16">
                                    <h1 class="text-5xl font-bold leading-[1.1] mb-6">Household and Lifestyle Services
                                        to Your Doorstep</h1>
                                    <p class="text-xl leading-[1.5]">Hiroes offer a wide range of at-home service
                                        categories for your household and lifestyle needs. </p>
                                </div>
                                <div class="flex gap-3">
                                    <a href="#"
                                        class="bg-slate-900 hover:bg-slate-700 border-solid border-1 border-slate-200 text-white text-lg font-medium py-4 px-6 rounded">
                                        <div class="anvil"></div>Find
                                        Services
                                    </a>
                                    <a href="#"
                                        class="bg-slate-0 hover:bg-slate-200 border-solid border-1 border-slate-200 text-black text-lg font-medium py-4 px-6 rounded">Learn
                                        More</a>
                                </div>
                            </div>
                            <div class="bg-slate-100 aspect-3/2 object-cover max-w-auto"></div>
                        </div>
                    </div>
                </section>

                <!-- DIVIDER -->

                <div class="bg-slate-200 w-full h-px"></div>

                <!-- SECTION SERVICE AND CATEGORY-->

                <section>
                    <div class="pt-20 pb-32">

                        <!-- SECTION HEADER -->

                        <div class="hiroes_content_s1 max-w-md pt-10">
                            <div>
                                <h2 class="text-4xl font-bold leading-[1.1] mb-4">Explore Services & Prices</h2>
                                <p class="text-xl leading-[1.5]">Hiroes offer a wide range of at-home service
                                    categories for your household and lifestyle needs.</p>
                            </div>
                        </div>

                        <!-- TABS -->

                        <div class="flex flex-row gap-2 overflow-x-auto text-nowrap mt-8 mb-16">
                            <button
                                class="tab-btn active-tab cursor-pointer text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 text-slate-900 hover:text-slate-50"
                                onclick="showTab(0)">Available</button>
                            <button
                                class="tab-btn cursor-pointer text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 text-slate-900 hover:text-slate-50"
                                onclick="showTab(1)">Handyman & Repair</button>
                            <button
                                class="tab-btn cursor-pointer text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 text-slate-900 hover:text-slate-50"
                                onclick="showTab(2)">Appliances</button>
                            <button
                                class="tab-btn cursor-pointer text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 text-slate-900 hover:text-slate-50"
                                onclick="showTab(3)">Maintenance</button>
                            <button
                                class="tab-btn cursor-pointer text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 text-slate-900 hover:text-slate-50"
                                onclick="showTab(4)">Self Care & Wellness</button>
                            <button
                                class="tab-btn cursor-pointer text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 text-slate-900 hover:text-slate-50"
                                onclick="showTab(5)">Party & Event</button>
                        </div>

                        <!-- TABS CONTENT -->

                        <!-- ALL TABS CONTENTS -->
                        <div class="space-y-2 tab-content active-content">

                            <!-- ACCORDION COMPONENT -->

                            <div class="border border-slate-200 rounded-lg overflow-hidden shadow-md p-1 space-y-1"
                                data-name="component">
                                <button
                                    class="w-full flex justify-between align-start gap-4 items-center p-3 md:p-6 text-slate-900 text-left hover:bg-slate-50 transition"
                                    onclick="toggleAccordion(this)">
                                    <div class="flex flex-col gap-2 max-w-full sm:max-w-3/4">
                                        <span class="categoryTitle text-xl font-medium">Accordion Title</span>
                                        <p class="categoryDescription text-base font-normal">Lorem ipsum dolor sit
                                            amet consectetur adipisicing elit. Eligendi nulla nisi odit iure dolorum
                                            mollitia, incidunt architecto, sequi quos repudiandae ipsa facilis eaque
                                            esse accusantium ad porro voluptates assumenda explicabo corrupti ipsam
                                            quisquam autem voluptatum. Sed magni quasi animi ipsa non natus? Aliquid,
                                            officiis. Distinctio error voluptatibus vel expedita suscipit.</p>
                                    </div>
                                    <svg class="self-start hidden sm:block shrink-0 w-5 h-5 transition-transform transform rotate-0"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="hidden p-0 bg-slate-0 text-slate-700 grid grid-cols-1 md:grid-cols-2 gap-1">
                                    <div class="serviceCard bg-slate-50 border border-slate-100 flex flex-col rounded-md p-3 md:px-5 py-3">
                                        <div class="serviceName text-xl font-medium">Service Title</div>
                                        <div class="servicePrize">Price</div>
                                        <button class="self-start pt-6 pb-2"><a href="#"
                                                class="bg-white hover:bg-slate-900 border-solid border-1 border-slate-200 text-black hover:text-white text-base font-medium py-2 px-3 rounded">Book
                                                on WhatsApp</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- REPAIRS AND SERVICES -->
                        <div class="space-y-2 tab-content hidden">ℹ️ About Us: We provide amazing services.</div>

                        <!-- APPLIANCES -->
                        <div class="space-y-2 tab-content hidden">📞 Contact Us: Reach us at contact@example.com.</div>

                        <!-- MAINTENANCE -->
                        <div class="space-y-2 tab-content hidden">Tab 4</div>

                        <!-- SELF CARE & WELLNESS -->
                        <div class="space-y-2 tab-content hidden">Tab 5</div>

                        <!-- PARTY & EVENT -->
                        <div class="space-y-2 tab-content hidden">Tab 6</div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->

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

    function showTab(index) {
        const tabs = document.querySelectorAll(".tab-btn");
        const contents = document.querySelectorAll(".tab-content");

        // Remove active classes from all tabs and hide all content
        tabs.forEach((tab) => tab.classList.remove("active-tab", "bg-slate-900", "text-white", "shadow-md"));
        contents.forEach((content) => content.classList.add("hidden"));

        // Add active class to the clicked tab and show its content
        tabs[index].classList.add("active-tab", "text-white", "bg-slate-900", "shadow-md");
        contents[index].classList.remove("hidden");
    }
    </script>
</body>

</html>