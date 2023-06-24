<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Tambah pesanan</h1>
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
                                    <h3 class="card-title">Data pesanan</h3>
                                </div>
                                <form @submit.prevent="tambah">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama pesanan</label>
                                            <input type="text" class="form-control" v-model="pesanan.nama_pesanan">
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text"  class="form-control" v-model="pesanan.harga">
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label>Jenis</label>
                                            </div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">                                                
                                                <label class="btn btn-secondary">
                                                    <input type="radio" value="makanan" v-model="pesanan.jenis">Makanan
                                                </label>
                                                <label class="btn btn-secondary">
                                                    <input type="radio" value="minuman" v-model="pesanan.jenis">Minuman
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
import axios from 'axios';

export default {
    name: 'IndexPesanan',
    data() {
        return {
            pesanan: {
                nama_pesanan: '',
                harga: '',
                jenis: ''
            }
        }
    },
    methods: {
        tambah() {
            axios
                .post('http://localhost:8000/api/createtransaksi', this.pesanan)
                .then(() => {
                    this.$router.push('/pesanan');
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    },
};
</script>
