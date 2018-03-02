<template>
   <li class="list-group-item success"><slot></slot></li>
</template>

<script>
    export default {
        mounted() {
            console.log('deveria imprimir')
        }
    }
</script>
