@extends('template.koneksi.template')

@section('title', 'Selamat Datang di Website HIMSI UNAIR!')
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', 'body') {{-- kalo butuh class buat body --}}
@section('container', 'landing')

@section('content')
    <div class="alumni">
        <nav class="sidebar">
            {{-- Sidebar --}}
            <h4 class="sidebar__title">Tahun Lulus</h4>
            <div class="sidebar__year">
                <button class="sidebar__btn selected" type="button">2019</button>
                <button class="sidebar__btn" type="button">2018</button>
                <button class="sidebar__btn" type="button">2017</button>
            </div>
        </nav>
        <main class="main">
            <div class="list">
                {{-- Search bar --}}
                <form class="search" autocomplete="off">
                    <h4 class="main__title">Data Alumni</h4>
                    <div class="search__bar">
                        <img src="{{ url('assets\img\mercusuar\icon\search.svg') }}" alt="">
                        <input type="search" class="search__bar__input" placeholder="Telusuri Data Alumni">
                    </div>
                </form>
                {{-- Main Content -> List of Alumni --}}
                <div class="table">
                    <table class="table__content">
                        <tr>
                            <th>Nama</th>
                            <th>Profil</th>
                            <th>Email</th>
                            <th>Bidang Pekerjaan</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Darfito Danur</td>
                            <td><a href="">linkedin</a></td>
                            <td>darfito@gmail.com</td>
                            <td>Software Developer</td>
                            <td>
                                <button class="show-info"><img
                                            src="{{ url('assets/img/mercusuar/icon/info.svg') }}"></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Cakra Kusuma Erlangga Ramdani</td>
                            <td><a href="">linkedin</a></td>
                            <td>cak@gmail.com</td>
                            <td>Web Developer</td>
                             <td>
                                <button class="show-info"><img
                                            src="{{ url('assets/img/mercusuar/icon/info.svg') }}"></button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {{-- Pagination --}}
            <div class="pagination">
                <button>&lt</button>
                <button class="selected">1</button>
                <button>2</button>
                <button>&gt</button>
            </div>

         {{-- modal --}}
        <dialog class="modal-box">
            <div class="modal-box__wrapper">
                <h2>Detail Info</h2>
                <div class="detail-info">
                    <div class="field">
                        <div class="field-left">
                            <div class="form-group-detail">
                                <label class="form-label" for="name">Nama</label>
                                <span id="name" class="form-control-plaintext">Darfito Danur</span>
                            </div>
                            <div class="form-group-detail">
                                <label class="form-label">Email</label>
                                <span class="form-control-plaintext">Himsi@gmail.com</span>
                            </div>
                            <div class="form-group-detail">
                                <label class="form-label">Nomor Telepon</label>
                                <span class="form-control-plaintext">+62*****</span>
                            </div>
                        </div>
                        <div class="field-right">
                            <div class="form-group-detail">
                                <label class="form-label">Jabatan</label>
                                <span class="form-control-plaintext">duduk aja</span>
                            </div>
                            <div class="form-group-detail">
                                <label class="form-label">Profil Linkedin</label>
                                <span class="form-control-plaintext">ini linknya gan</span>
                            </div>
                            <div class="form-group-detail">
                                <label class="form-label">Nama dan Alamat Perusahaan</label>
                                <span class="form-control-plaintext">krusty crab</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" class="close-btn">Close</button>
                </div>
            </div>
        </dialog>
        </main>
    </div>
@endsection

@section('extrajs')
 <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btns = document.querySelectorAll(".show-info");
            const modal = document.querySelector(".modal-box");
            const close = document.querySelector(".close-btn");
            const body = document.querySelector("body");

            btns.forEach(function(btn)
            {
                btn.addEventListener("click", (event) => {
                    event.stopPropagation()
                    modal.showModal();
                });
            });

            body.addEventListener("click", function(e)
            {
                // console.log(e.target);
                if (e.target === modal || e.target === close) {
                    modal.close();
                }
            });
        });
    </script>
@endsection