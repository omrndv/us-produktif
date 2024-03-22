<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="p-4 sm:ml-64 mt-4">
        <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
            My Profile
        </div>
        <div class="text-xl font-semibold mt-2" style="color: gray;">
            Setting Page
        </div>
        <div class="p-6 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-6">
            <div class="flex items-center">
                <div class="ml-3">
                    <div class="text-xl font-semibold">
                        <?= session()->get('nama'); ?>
                    </div>
                    <div class="text-m font-semibold text-gray-500 mt-1">
                        <?= session()->get('kelas'); ?>
                    </div>
                    <div class="text-m font-medium text-gray-400 mt-1">
                        <?= session()->get('username'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-4">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#edit-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#aduan" type="button" role="tab" aria-controls="contacts" aria-selected="false">Kotak Aduan</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden p-4 rounded-lg" id="aduan" role="tabpanel" aria-labelledby="contacts-tab">
                    <div class="mb-5">
                        <div class="rounded-lg">
                            <form method="post" action="<?= site_url('/up-aduan'); ?>">
                                <div class="mb-6">
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama" required placeholder="Masukkan nama anda..">
                                </div>
                                <div class="mb-6">
                                    <label for="kelasJabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas/Jabatan</label>
                                    <input type="text" id="kelasJabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="kelas/jabatan" required placeholder="Masukkan kelas/jabatan anda..">
                                </div>
                                <div class="mb-6">
                                    <label for="isiAduan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                                        Aduan</label>
                                    <textarea class="textarea border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="isiAduan" name="isi" required placeholder="Masukkan isi aduan anda.." style="height: 150px;"></textarea>
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg" id="edit-profile" role="tabpanel" aria-labelledby="contacts-tab">
                    <div class="mb-5">
                        <div class="rounded-lg">
                            <form method="post" action="<?= site_url('/updateprofil'); ?>">
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                        <input type="text" id="nama-depan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?= session()->get('nama'); ?>" readonly />
                                    </div>
                                    <div>
                                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                                            Tanggal lahir</label>
                                        <input type="text" id="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus: ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?= $siswa['ttl']; ?>" required name="ttl" />
                                    </div>
                                    <div>
                                        <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?= session()->get('username'); ?>" readonly />
                                    </div>
                                    <div>
                                        <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                        <input type="number" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?= session()->get('kelas'); ?>" readonly />
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?= $siswa['alamat']; ?>" name="alamat"></textarea>
                                </div>
                                <div class="flex items-start mb-6">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                                    </div>
                                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with
                                        the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms
                                            and conditions</a>.</label>
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                fetch(form.getAttribute('action'), {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
</body>

</html>