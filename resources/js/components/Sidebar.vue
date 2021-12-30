<template>
  <div class="list-group">
    <router-link class="list-group-item list-group-item-action" :to="{ name: 'home' }">Home</router-link>
    <router-link class="list-group-item list-group-item-action" :to="{ name: 'hello' }">About</router-link>
    <router-link class="list-group-item list-group-item-action" :to="{ name: 'users.index' }">Users</router-link>
    <router-link class="list-group-item list-group-item-action" :to="{ name: 'roles.index' }">Roles</router-link>
    <router-link
      class="list-group-item list-group-item-action"
      :to="{ name: 'customers.index' }"
    >Customers</router-link>
    <router-link
      class="list-group-item list-group-item-action"
      :to="{ name: 'subscribers.index' }"
    >Subscriber</router-link>
      :to="{ name: 'channels.index' }"
    >Channels</router-link>
  </div>
</template>
