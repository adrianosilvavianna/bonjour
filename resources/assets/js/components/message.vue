<template>
   <li class="list-group-item list-group-item-success"><slot></slot>
        <small>You</small>
   </li>
</template>

<script>
    export default {
        mounted() {
            console.log('deveria imprimir')
        }
    }
</script>
