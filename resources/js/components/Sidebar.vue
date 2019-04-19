<template>
    <div class="list-group">
        <router-link class="list-group-item list-group-item-action" :to="{ name: 'home' }">Home</router-link>
        <router-link class="list-group-item list-group-item-action" :to="{ name: 'hello' }">About</router-link>
        <router-link class="list-group-item list-group-item-action" :to="{ name: 'users.index' }">Users</router-link>
    </div>
</template>