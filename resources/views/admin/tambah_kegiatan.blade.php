@extends('layouts.app')

@section('title', 'Form Informasi Kegiatan')

@section('content')

    <h3>Form Informasi Kegiatan</h3>

    <form action="/postingan/store" method="POST" enctype="multipart/form-data" id="uploadForm">
        {{ csrf_field() }}
        <div class="detail-kegiatan-edit">

            <!-- <center><img src="./image/poster.png" alt="/poster"></center> -->
            <br>

            <div class="row">
                <label for="inputNamaKegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="text" class="form-control" id="inputNamaKegiatan" placeholder="Masukkan Nama Kegiatan"
                        name="nama_kegiatan">
                </div>
            </div>

            <div class="row">
                <label for="inputNamaKegiatan" class="col-sm-3 col-form-label">Jenis Kegiatan</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <select class="form-control" name="jenis_kegiatan" id="jenis_kegiatan">
                        <option value="1">Beasiswa</option>
                        <option value="3">Event</option>
                        <option value="2">Lomba</option>
                        <option value="4">Volunteer</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <label for="inputHariTanggal" class="col-sm-3 col-form-label">Hari & Tanggal Pelaksanaan</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="text" class="form-control" id="inputHariTanggal" placeholder="Hari, Tanggal"
                        name="tanggal">
                </div>
            </div>

            <div class="row">
                <label for="inputLokasi" class="col-sm-3 col-form-label">Lokasi</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="text" class="form-control" id="inputLokasi" placeholder="Masukkan Lokasi"
                        name="lokasi">
                </div>
            </div>
            <div class="row">
                <label for="inputBenefit" class="col-sm-3 col-form-label">Benefit</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="text" class="form-control" id="inputBenefit" placeholder="Masukkan Benefit"
                        name="benefit">
                </div>
            </div>
            <div class="row">
                <label for="inputAkunIG" class="col-sm-3 col-form-label">Akun IG</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="text" class="form-control" id="inputAkunIG" placeholder="Masukkan akun instagram"
                        name="ig_pelaksana">
                </div>
            </div>
            <div class="row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="email" class="form-control" id="inputEmail" name="email_pelaksana">
                </div>
            </div>
            <div class="row">
                <label for="inputLinkPendaftaran" class="col-sm-3 col-form-label">Link Pendaftaran</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="text" class="form-control" id="inputLinkPendaftaran" name="link_pendaftaran">
                </div>
            </div>
            <div class="row">
                <label for="Caption" class="col-sm-3 col-form-label">Caption</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="text" class="form-control" placeholder="Masukkan Caption" id="Caption"
                        style="height: 100px" name="caption">
                </div>
            </div>
            <div class="row">
                <label for="poster" class="col-sm-3 col-form-label">Poster Kegiatan</label>
                <div class="col-sm-6">
                    <h4>:</h4>
                    <input type="file" class="" placeholder="Masukkan Gambar" id="poster" style="height: 100px"
                        name="poster_postingan">
                </div>
            </div>

            <center><button class="btn btn-success" type="submit" id="uploadButton">Upload</button></center>
            <script>
                const uploadButton = document.getElementById('uploadButton');

                uploadButton.addEventListener('click', (event) => {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Konfirmasi Upload',
                        text: 'Apakah Anda yakin ingin upload?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Lanjutkan ke tindakan upload
                            const form = document.getElementById('uploadForm');
                            form.submit();
                        } else {
                            // Batal upload
                            console.log('Batal upload');
                        }
                    });
                });
            </script>

        </div>
    </form>
@endsection
