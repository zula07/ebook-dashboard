<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Canavar E-Kitap Arama</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Canavar E-Kitap Arayıcı</h1>
        <form id="searchForm" class="flex gap-2">
            <input type="text" id="query" class="border p-2 flex-grow" placeholder="Kitap adı girin...">
            <button type="submit" class="bg-blue-500 text-white p-2">Ara</button>
        </form>
        <div id="results" class="mt-4"></div>
    </div>
    <script>
        document.getElementById('searchForm').onsubmit = async (e) => {
            e.preventDefault();
            const q = document.getElementById('query').value;
            const res = await fetch('search.php?query=' + q);
            const data = await res.json();
            document.getElementById('results').innerText = JSON.stringify(data, null, 2);
        };
    </script>
</body>
</html>
