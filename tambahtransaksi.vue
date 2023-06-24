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
                                            <label>Nama Menu</label>
                                            <select class="form-control form-control-sm" v-model="pesanan.id_menu">
                                              <option disabled value="">--Pilih Menu--</option> 
                                              <option v-for="m in menu" :key="m.id_menu" :value="m.id_menu">
                                                {{ m.nama_menu }}
                                              </option>
                                            </select>
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text"  class="form-control" v-model="pesanan.qty">
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
            menu: [],
            pesanan: {
                id_menu: '',
                qty: ''
            }
        }
    },
    created() {
        this.DataMenu();
    },
    methods: {
        DataMenu() {
            axios.get('http://localhost:8000/api/getmenu')
                .then(response => {
                    this.menu = response.data;
                })
                .catch(err => {
                    console.error(err);
                });
        },
        
        tambah() {
            axios
                .post('http://localhost:8000/api/createtransaksi', this.pesanan)
                .then(() => {
                    this.$router.push('/transaksi');
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    },
};
</script>
