<div class="p-4 sm:ml-64 mt-4 mb-5">
    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Halo,<br>
        <?= session()->get('nama'); ?>
    </div>
    <div class="text-xl font-semibold mt-2" style="color: gray;">
        History Rekap Absensi
    </div>
    <div class="flex items-center mt-4">
        <input type="date" id="tanggal" name="tanggal" class="px-2 py-1 border border-gray-300 rounded-md ml-auto">
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table id="absensi-table" class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-4 py-3 border border-gray-400 text-center">No</th>
                    <th scope="col" class="px-4 py-3 border border-gray-400">Nama</th>
                    <th scope="col" class="px-4 py-3 border border-gray-400 text-center">Kelas</th>
                    <th scope="col" class="px-4 py-3 border border-gray-400 text-center">Mapel</th>
                    <th scope="col" class="px-4 py-3 border border-gray-400 text-center">Tanggal</th>
                    <th scope="col" class="px-4 py-3 border border-gray-400">Absen</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        <ul class="flex">
            <?php
            $totalPages = ceil(count($data_absensi) / 5);
            ?>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="px-3 py-2 <?= $i === 1 ?: '' ?>">
                    <a href="#" onclick="changePage(<?= $i ?>)" class="block text-blue-500 hover:text-white hover:bg-blue-500 rounded-md px-2 py-1">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </div>
</div>

<script>
    var dataAbsensi = <?= json_encode($data_absensi) ?>;
    var currentPage = 1;

    function updateTableByPage(page) {
        var tableBody = document.querySelector("#absensi-table tbody");
        tableBody.innerHTML = "";
        var startIndex = (page - 1) * 5;
        var endIndex = Math.min(startIndex + 5, dataAbsensi.length);
        for (var i = startIndex; i < endIndex; i++) {
            var absensi = dataAbsensi[i];
            var rowClass = getRowClass(absensi.absen);
            var row = `
                    <tr class="${rowClass}">
                        <td class="px-4 py-2 border border-gray-400 text-center">${i + 1}</td>
                        <td class="px-4 py-2 border border-gray-400">${absensi.nama}</td>
                        <td class="px-4 py-2 border border-gray-400 text-center">${absensi.kelas}</td>
                        <td class="px-4 py-2 border border-gray-400 text-center">${absensi.mapel}</td>
                        <td class="px-4 py-2 border border-gray-400 text-center">${absensi.tanggal}</td>
                        <td class="px-4 py-2 border border-gray-400">${absensi.absen}</td>
                    </tr>
                `;
            tableBody.insertAdjacentHTML("beforeend", row);
        }
    }

    function changePage(page) {
        currentPage = page;
        updateTableByPage(page);
    }
    updateTableByPage(currentPage);
    document.getElementById("tanggal").addEventListener("change", function() {
        var tanggal = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "<?php echo base_url('history/getDataByTanggal/'); ?>" + tanggal, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                dataAbsensi = data;
                updateTableByPage(1);
            }
        };
        xhr.send();
    });

    function getRowClass(status) {
        switch (status) {
            case 'Hadir':
                return 'bg-green-300';
            case 'Izin':
                return 'bg-yellow-300';
            default:
                return 'bg-red-400';
        }
    }
</script>