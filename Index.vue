<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Mahasiswa</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <router-link class="btn btn-info mb-2" to="/mahasiswa/tambah">
                                        <i class="fas fa-plus"></i> Tambah
                                    </router-link>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nama Lengkap</th>
                                                <th>Alamat</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Jurusan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(s, index) in mahasiswa" :key="s.id">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ s.nama }}</td>
                                                <td>{{ s.alamat }}</td>
                                                <td>{{ s.jeniskelamin }}</td>
                                                <td>{{ s.nama_jurusan }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <router-link class="btn btn-warning"
                                                            :to="{ name: 'EditMahasiswa', params: { id: s.id } }">Edit</router-link>
                                                        <button type="button" @click="hapus(s.id)"
                                                            class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import axios from 'axios';

Vue.use(axios);
export default {
    name: 'IndexMahasiswa',
    data() {
        return {
            mahasiswa: []
        };
    },
    created() {
        this.DataMahasiswa();
    },
    methods: {
        DataMahasiswa() {
            axios.get('http://localhost:8000/api/getmahasiswa')
                .then(response => {
                    this.mahasiswa = response.data;
                })
                .catch(err => {
                    console.error(err);
                });
        },
        hapus(id) {
            axios.delete(`http://localhost:8000/api/deletemahasiswa/${id}`)
                .then(() => {
                    this.mahasiswa = this.mahasiswa.filter(item => item.id !== id);
                })
                .catch(err => {
                    console.error(err);
                });
        }
    }
};
</script>
