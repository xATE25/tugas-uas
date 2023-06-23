<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Makanan </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <router-link class="btn btn-info mb-2" to="menu/tambah">
                                        <i class="fas fa-plus"></i> Tambah
                                    </router-link>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Nama Menu</th>
                                                <th>Harga</th>
                                                <th>Jenis</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(m, index) in menu" :key="m.id_menu">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ m.nama_menu }}</td>
                                                <td>{{ m.harga }}</td>
                                                <td>{{ m.jenis }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- <router-link class="btn btn-success" :to="{ name: 'detailmenu', params: { id: m.id } }">Detail</router-link> -->
                                                        <router-link class="btn btn-warning" :to="{ path: '/menu/EditMenu/' + m.id_Menu }">Edit</router-link>
                                                         <button type="button" @click="hapus(m.id_menu)" class="btn btn-danger">Hapus</button>                                                        
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
    name : 'IndexMenu',
    data() {
        return {
            menu: []
        };
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
            hapus(id) {
            var url = `http://localhost:8000/api/deletemenu`+ id;
            axios.delete(url)
            alert("Sukses delete menu");
            location.reload()               
        }  
    },
    
};
</script>

