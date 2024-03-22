<div class="mt-4 p-4 sm:ml-64">
    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Detail Jurnal
    </div>

    <div class="mt-8 flex justify-between items-center">
        <div></div>

        <div>
            <a href="<?= site_url('tambah-data-jurnal/' . $id_dafjur) ?>"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Tambah
                Data</a>
            <button id="deleteSelected"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Hapus
                Data</button>
            <button id="exportToExcel"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600">
                Export to Excel
            </button>
        </div>
    </div>


    <div class="overflow-x-auto mt-3">
        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mapel
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Absen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                </tr>
            </thead>
            <tbody id="table-data"
                class="divide-y divide-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <?php foreach ($absenData as $absen): ?>
                    <?php
                    $rowClass = '';
                    switch ($absen['absen']) {
                        case 'Hadir':
                            $rowClass = 'bg-green-300';
                            break;
                        case 'Izin':
                            $rowClass = 'bg-yellow-300';
                            break;
                        default:
                            $rowClass = 'bg-red-300';
                            break;
                    }
                    ?>
                    <tr class="<?= $rowClass ?>">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-blue-600 rounded"
                                    onchange="toggleRowCheckbox(this)" value="<?= $absen['id'] ?>">
                                <label class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p>
                                <?= $absen['nama'] ?>
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p>
                                <?= $absen['kelas'] ?>
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p>
                                <?= $absen['mapel'] ?>
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p>
                                <?= $absen['absen'] ?>
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p>
                                <?= $absen['deskripsi'] ?>
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p>
                                <?= $absen['tanggal'] ?>
                            </p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx-style/0.8.14/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
<script>
    document.getElementById('deleteSelected').addEventListener('click', function () {
        var selectedIds = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function (checkbox) {
            selectedIds.push(checkbox.value);
        });

        if (selectedIds.length === 0) {
            alert('Pilih setidaknya satu data untuk dihapus.');
            return;
        }

        if (confirm('Anda yakin ingin menghapus data terpilih?')) {
            var form = document.createElement('form');
            form.action = '<?= site_url('/hapus-data') ?>';
            form.method = 'POST';

            selectedIds.forEach(function (id) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selectedIds[]';
                input.value = id;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        }
    });

    // Checkbox All
    document.getElementById('checkbox-all-search').addEventListener('change', function () {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = event.target.checked;
        });
    });
</script>
<script>
    document.getElementById('exportToExcel').addEventListener('click', function () {
        var table = document.getElementById('table-data');
        var rows = table.querySelectorAll('tr');
        var data = [];

        // Tambahkan header ke data
        var header = ["Nama", "Kelas", "Mapel", "Absen", "Tanggal"]; // Sesuaikan dengan kebutuhan Anda
        data.push(header);

        rows.forEach(function (row) {
            var rowData = [];
            var cells = row.querySelectorAll('td:nth-child(2), td:nth-child(3), td:nth-child(4), td:nth-child(5), td:nth-child(7)');
            cells.forEach(function (cell) {
                rowData.push(cell.innerText);
            });
            data.push(rowData);
        });

        // Buat worksheet
        var ws = XLSX.utils.aoa_to_sheet(data);

        // Tambahkan gaya pada header
        ws["A1"].s = {
            fill: { patternType: "solid", fgColor: { rgb: "FFFF00" } }, // Warna latar belakang kuning
            font: { bold: true } // Membuat teks tebal
        };

        // Definisikan lebar kolom
        var wscols = [
            { wch: 25 }, // Lebar kolom pertama
            { wch: 15 }, // Lebar kolom kedua
            { wch: 15 }, // Lebar kolom ketiga
            { wch: 10 }, // Lebar kolom keempat
            { wch: 15 }  // Lebar kolom kelima
        ];

        // Tambahkan lebar kolom ke worksheet
        ws['!cols'] = wscols;

        // Ekspor ke file Excel
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
        var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }
        var fileName = 'data-absen.xlsx';
        var blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });
        saveAs(blob, fileName); // Nama file yang akan disimpan
    });
</script>