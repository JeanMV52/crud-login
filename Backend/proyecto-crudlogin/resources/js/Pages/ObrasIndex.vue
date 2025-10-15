<template>
    <div>
        <h1>Lista de Obras</h1>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="obra in obras" :key="obra.id">
                    <td>{{ obra.titulo }}</td>
                    <td>{{ obra.descripcion }}</td>
                    <td>
                        <button @click="deleteObra(obra.id)">Eliminar</button>
                        <router-link :to="'/obras/' + obra.id + '/editar'">Editar</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
        <router-link to="/obras/crear">Crear nueva obra</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            obras: [],
        };
    },
    created() {
        this.fetchObras();
    },
    methods: {
        fetchObras() {
            axios.get('/obras').then((response) => {
                this.obras = response.data;
            });
        },
        deleteObra(id) {
            if (confirm('¿Estás seguro de eliminar esta obra?')) {
                axios.delete(`/obras/${id}`).then(() => {
                    this.fetchObras();  // Refrescar la lista
                });
            }
        },
    },
};
</script>
