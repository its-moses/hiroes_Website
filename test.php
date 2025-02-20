<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Tabs with Tailwind</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<style>
        .tab-btn {
            @apply px-4 py-2 text-gray-600 border-b-2 border-transparent focus:outline-none hover:text-blue-500;
        }
        .active-tab {
            @apply border-blue-500 text-blue-500 font-semibold;
        }
        .tab-content {
            @apply p-4 border rounded-lg bg-gray-50 mt-2;
        }
    </style>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="w-full max-w-md mx-auto bg-white p-4 rounded-lg shadow-md">
        <!-- Tabs Buttons -->
        <div class="flex border-b">
            <button class="tab-btn active-tab text-lg font-medium py-1 px-4 rounded-full border border-slate-200 bg-slate-0 hover:bg-slate-900 hover:bg-slate-100 text-slate-900 hover:text-slate-50" onclick="showTab(0)">Home</button>
            <button class="tab-btn" onclick="showTab(1)">About</button>
            <button class="tab-btn" onclick="showTab(2)">Contact</button>
        </div>

        <!-- Tabs Content -->
        <div class="tab-content active-content">🏠 Welcome to the Home Page!</div>
        <div class="tab-content hidden">ℹ️ About Us: We provide amazing services.</div>
        <div class="tab-content hidden">📞 Contact Us: Reach us at contact@example.com.</div>
    </div>

    <script>
        function showTab(index) {
            const tabs = document.querySelectorAll(".tab-btn");
            const contents = document.querySelectorAll(".tab-content");

            // Remove active classes from all tabs and hide all content
            tabs.forEach((tab) => tab.classList.remove("active-tab"));
            contents.forEach((content) => content.classList.add("hidden"));

            // Add active class to the clicked tab and show its content
            tabs[index].classList.add("active-tab");
            contents[index].classList.remove("hidden");
        }
    </script>
</body>
</html>
