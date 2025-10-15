<template>
    <div>
        <h1>Editar Obra</h1>
        <form @submit.prevent="updateObra">
            <div>
                <label for="titulo">Título</label>
                <input type="text" v-model="titulo" required />
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <textarea v-model="descripcion" required></textarea>
            </div>
            <!-- Otros campos -->
            <button type="submit">Actualizar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            obra: {},
            titulo: '',
            descripcion: '',
        };
    },
    created() {
        this.fetchObra();
    },
    methods: {
        fetchObra() {
            const id = this.$route.params.id;
            axios.get(`/obras/${id}`).then((response) => {
                this.obra = response.data;
                this.titulo = this.obra.titulo;
                this.descripcion = this.obra.descripcion;
            });
        },
        updateObra() {
            const id = this.$route.params.id;
            axios.put(`/obras/${id}`, {
                titulo: this.titulo,
                descripcion: this.descripcion,
            }).then(() => {
                this.$router.push('/obras');
            });
        },
    },
};
</script>
