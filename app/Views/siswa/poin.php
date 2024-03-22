<div class="p-4 sm:ml-64 mt-4 mb-5">
    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Poin <br>
        <?= session()->get('nama'); ?>
    </div>
    <div class="text-xl font-semibold mt-2" style="color: gray;">
        <p>Berikut merupakan informasi tentang poin anda.</p>
    </div>
    <div class="container mt-8">
        <div class="row">
            <div class="col-12 mt-5">
                <table class="w-full border-collapse border border-gray-200">
                    <tr>
                        <th class="border border-gray-200 px-4 py-2">Nama</th>
                        <td class="border border-gray-200 px-4 py-2">
                            <?php echo session()->get('nama'); ?>
                        </td>
                    </tr>
                    <tr>
                        <th class="border border-gray-200 px-4 py-2">Kelas</th>
                        <td class="border border-gray-200 px-4 py-2">
                            <?php echo session()->get('kelas'); ?>
                        </td>
                    </tr>
                    <tr>
                        <th class="border border-gray-200 px-4 py-2">Jumlah poin</th>
                        <td class="border border-gray-200 px-4 py-2">
                            <?php echo session()->get('poin'); ?>
                        </td>
                    </tr>
                    <tr>
                        <th class="border border-gray-200 px-4 py-2">Kategori</th>
                        <td class="border border-gray-200 px-4 py-2">
                            <?php
                            $poin = session()->get('poin');
                            if ($poin < 1) {
                                echo "Kamu termasuk ke dalam kategori hijau atau tidak ada pelanggaran tata tertib.";
                            } elseif ($poin >= 1 && $poin < 75) {
                                echo "Kamu termasuk ke dalam kategori kuning atau pelanggaran tata tertib tipe sedang.";
                            } else {
                                echo "Kamu termasuk ke dalam kategori merah atau pelanggaran tata tertib tipe berat.";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>