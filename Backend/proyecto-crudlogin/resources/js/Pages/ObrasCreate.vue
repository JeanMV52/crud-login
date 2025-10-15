<template>
    <div>
        <h1>Crear Obra</h1>
        <form @submit.prevent="createObra">
            <div>
                <label for="titulo">Título</label>
                <input type="text" v-model="titulo" required />
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <textarea v-model="descripcion" required></textarea>
            </div>
            <button type="submit">Crear</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            titulo: '',
            descripcion: '',
        };
    },
    methods: {
        createObra() {
            axios
                .post('/obras', {
                    titulo: this.titulo,
                    descripcion: this.descripcion,
                })
                .then(() => {
                    this.$router.push('/obras');
                });
        },
    },
};
</script>
