<script setup>
import { onMounted } from "vue";
import { useAuthStore } from "../../stores/auth";


const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();
  await authStore.getProduct();
});
const deleteProduct = (product_id) => {

}

</script>
<template>
  <div class="max-w-7xl mx-auto">
    edit
    <div v-if="authStore.user">
      <h1>User: {{ authStore.user.name }}</h1>
      <p>Email: {{ authStore.user.email }}</p>
      <div>
        <table class="table">
          
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in  authStore.authProducts" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'Edit', params: { id: product.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
            </table>
      </div>
    </div>
    <div v-else>
      <h1>Go and login</h1>
    </div>
  </div>
</template>