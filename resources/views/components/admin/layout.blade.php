<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Admin</title>

<link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />

<style>
    .sidebar-link {
        transition: background-color .15s ease, color .15s ease;
    }

    .sidebar-link:hover {
        background-color: #f3f4f6;
        color: #111827;
    }

    .sidebar-link:hover .sidebar-icon svg {
        color: #111827;
    }

    .sidebar-link-active {
        background-color: #f3f4f6;
        color: #111827;
        font-weight: 600;
    }

    .sidebar-link-active .sidebar-icon svg {
        color: #111827;
    }

    .dark .sidebar-link:hover,
    .dark .sidebar-link-active {
        background-color: #374151;
        color: #ffffff;
    }

    .dark .sidebar-link:hover .sidebar-icon svg,
    .dark .sidebar-link-active .sidebar-icon svg {
        color: #ffffff;
    }

    @media (prefers-color-scheme: dark) {
        .sidebar-link:hover,
        .sidebar-link-active {
            background-color: #374151;
            color: #ffffff;
        }

        .sidebar-link:hover .sidebar-icon svg,
        .sidebar-link-active .sidebar-icon svg {
            color: #ffffff;
        }
    }

    .sidebar-link:focus-visible {
        outline: 2px solid #3b82f6;
        outline-offset: 2px;
    }
</style>

</head>

<body class="bg-gray-50 dark:bg-gray-900">

<div class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen">

    <!-- Navbar -->
    <x-admin.navbar />

    <!-- Sidebar -->
    <x-admin.sidebar />

    <!-- Content -->
    <main class="p-4 sm:ml-64 min-h-screen pt-20 bg-gray-50 dark:bg-gray-900">

        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            {{ $slot }}

        </div>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>


</body>

</html>
