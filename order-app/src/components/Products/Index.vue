<script setup>
import { onMounted } from "vue";
import { useAuthStore } from "../../stores/auth";


const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();
  await authStore.getProduct();
});
const order_placed = (product_id) => {
    if(product_id == null){
        alert('product not found!.');
    }
   // console.log(product_id);
    authStore.handleOrderPlaced(product_id)
}

</script>
<template>
  <div class="max-w-7xl mx-auto">
    <h1>Products</h1>
    <div v-if="authStore.user">
      <div>
        <table class="table">
          
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in  authStore.authProducts" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <!-- <router-link :to="{name: 'Edit', params: { id: product.id }}" class="btn btn-success">Edit</router-link> -->
                        <button class="btn btn-danger" @click="order_placed(product.id)">Purchase</button>
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