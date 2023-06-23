<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Tambah Menu</h1>
                        </div>          
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Data Menu</h3>
                                </div>
                                <form @submit.prevent="tambah">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Menu</label>
                                            <input type="text" class="form-control" v-model="Menu.nama">
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text"  class="form-control" v-model="Harga.alamat">
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label>Jenis</label>
                                            </div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">                                                
                                                <label class="btn btn-secondary">
                                                    <input type="radio" value="L" v-model="Menu.jenis"> Makanan
                                                </label>
                                                <label class="btn btn-secondary">
                                                    <input type="radio" value="P" v-model="Menu.jenis"> Minuman
                                                </label>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
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
import { VAlert } from 'vuetify/lib';



Vue.use(axios);
export default {
    name: 'TambahMahasiswa',
    data() {
        return {
            mahasiswa: {
                id_jurusan: ""
            },
            jurusan: [] // Update variabel jurusan
        }
    },
    created() {
        this.fetchJurusan();
    },
    methods: {
        fetchJurusan() {
            axios
                .get('http://localhost:8000/api/getjurusan')
                .then((res) => {
                    this.jurusan = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },

        tambah() {
            axios
                .post('http://localhost:8000/api/createmahasiswa', this.mahasiswa)
                .then(() => {
                    this.$router.push('/mahasiswa');
                })
                .catch((err) => {
                    console.log(err);
                });
        },

    },
};
</script>
