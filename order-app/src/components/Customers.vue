<script setup>
import { ref } from "vue";
import { onMounted } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

const term = ref(null);
const  customers =ref();
const filter = () =>{
  authStore.getCustomer(term.value);
}

onMounted(async () => {
  await authStore.getUser();
   await authStore.getCustomer(term.value);
   customers.value = authStore.authCustomers;
  
});
</script>
<template>
  <div class="max-w-7xl mx-auto">
    <h1>Customers</h1>
  
      <form>
        <div class="flex">
        <input v-model="term" 
          type="text"
          class="appearance-none border-2 pl-10 border-gray-300 hover:border-gray-400 transition-colors rounded-md w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-purple-600 focus:border-purple-600 focus:shadow-outline"
        >
        <button 
          @click="filter()"
          class="border-1 border-gray-300 bg-slate-900 text-white p-2 rounded-md"
        type="button">search</button>
      </div>
      </form>

    
    <div v-if="authStore.user">
      <div>
        <table class="table">
          <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Register Date</th>
              <th>Score Points</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="customer in  customers" :key="customer.id">
              <td>{{ customer.id }}</td>
              <td>{{ customer.name }}</td>
              <td>{{ customer.phone }}</td>
              <td>{{ customer.registration_date }}</td>
              <td> {{ customer.score_points ?? 0}} </td>
              <td>{{ customer.address }}</td>
              <td>
                  <div class="btn-group" role="group">
                      <router-link :to="{name: 'Edit', params: { id: customer.id }}" class="btn btn-success">Edit</router-link>
                      <button class="btn btn-danger" @click="deleteProduct(customer.id)">Delete</button>
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