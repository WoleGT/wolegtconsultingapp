<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Error</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen" style="background-color: #0D263C;">

    <div class="max-w-lg mx-auto p-8 bg-white shadow-lg rounded-lg text-center">
        <div class="flex justify-center mb-4">
            <div class="bg-red-100 rounded-full p-6 flex items-center justify-center">
                <img class="w-16 h-16 mx-auto" src="https://img.icons8.com/fluency/48/cancel.png" alt="Payment Error Icon"/>
            </div>
        </div>
        <h1 class="text-3xl font-semibold mb-4 text-gray-800">Payment Failed!</h1>
        <p class="text-gray-600 mb-6">We encountered an issue with your payment. Please try again or contact support.</p>
        <a href="/retry-payment" class="inline-block py-3 px-6 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition duration-300">Retry Payment</a>
    </div>

</body>
</html>