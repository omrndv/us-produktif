<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

<div class="p-4 sm:ml-64 mt-4">
    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        My Profile
    </div>
    <div class="text-xl font-semibold mt-2" style="color: gray;">
        Setting Page
    </div>
    <div class="p-6 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-6">
        <div class="flex items-center">
            <div class="mr-4">
                <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Profil Picture"
                    class="rounded-full w-24 h-24">
            </div>
            <div class="ml-3">
                <div class="text-xl font-semibold">Muhammad Sumbul</div>
                <div class="text-m font-semibold text-gray-500 mt-1">
                    <?= session()->get('kelas'); ?>
                </div>
                <div class="text-m font-medium text-gray-400 mt-1">5412111111</div>
            </div>
        </div>

    </div>
    <div class="p-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-4">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                        data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Profile</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="contacts-tab" data-tabs-target="#aduan" type="button" role="tab" aria-controls="contacts"
                        aria-selected="false">Kotak Aduan</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2">
                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Nama
                                Depan</label>
                            <label for="first_name"
                                class="block mb-2 text-lg font-medium dark:text-white w-full">Muhammad</label>
                        </div>
                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Nama
                                Belakang</label>
                            <label for="first_name"
                                class="block mb-2 text-lg font-medium dark:text-white w-full">Sumbul</label>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2">
                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Nomer Induk
                                Sekolah</label>
                            <label for="first_name"
                                class="block mb-2 text-lg font-medium dark:text-white w-full">5412121212</label>
                        </div>
                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Tempat Tanggal
                                Lahir</label>
                            <label for="first_name"
                                class="block mb-2 text-lg font-medium dark:text-white w-full">Purwokerto, 12 Januari
                                1998</label>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2">
                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Alamat
                                Email</label>
                            <label for="first_name"
                                class="block mb-2 text-lg font-medium dark:text-white w-full">5412111111@student-smktelkompwt.sch.id</label>
                        </div>
                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Nomor
                                Handphone</label>
                            <label for="first_name" class="block mb-2 text-lg font-medium dark:text-white w-full">+62
                                0987654321</label>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2">
                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Kelas</label>
                            <label for="first_name" class="block mb-2 text-lg font-medium dark:text-white w-full">
                                <?= session()->get('kelas'); ?>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Alamat</label>
                        <label for="first_name" class="block mb-2 text-lg font-medium dark:text-white w-full">Jl. DI
                            Panjaitan No.128, Karangreja, Purwokerto Kulon, Kec. Purwokerto Sel., Kabupaten
                            Banyumas, Jawa Tengah 53141</label>
                    </div>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                        content</strong>. Clicking another tab will toggle the visibility of this one for the next.
                    The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                aria-labelledby="settings-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Settings tab's associated
                        content</strong>. Clicking another tab will toggle the visibility of this one for the next.
                    The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
            <div class="hidden p-4 rounded-lg" id="aduan" role="tabpanel" aria-labelledby="contacts-tab">
                <div class="mb-5">
                    <div class="rounded-lg">
                        <form method="post" action="<?= site_url('/up-aduan'); ?>">
                            <div class="mb-6">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" id="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="nama" required placeholder="Masukkan nama anda..">
                            </div>
                            <div class="mb-6">
                                <label for="kelasJabatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas/Jabatan</label>
                                <input type="text" id="kelasJabatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="kelas/jabatan" required placeholder="Masukkan kelas/jabatan anda..">
                            </div>
                            <div class="mb-6">
                                <label for="isiAduan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                                    Aduan</label>
                                <textarea
                                    class="textarea border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="isiAduan" name="isi" required placeholder="Masukkan isi aduan anda.."
                                    style="height: 150px;"></textarea>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
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
                                location.reload(); // Refresh halaman
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>