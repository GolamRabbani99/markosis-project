<template>
   <div class="container" :class="{'loading': loading}">
       <div class="text-center">
      <h2 class="btn btn-primary">Total Product Information</h2>
      </div>
        <div class="row">
           
<table class="table bg-info text-dark">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">products Name and Quantity </th>
      <th scope="col"></th>
      
      <th scope="col">Product Code</th>
      <th scope="col">Unit Buying cost $</th>
      <th scope="col">Unit selling cost $</th>
      
       <th scope="col">Tax Rate %</th>
      <th scope="col">Created Date</th>
      <th scope="col">Upadated Date</th>
      
      
    
    </tr>
  </thead>

   <tbody>
 



 
    <tr v-for="product in products" :key="product.id">
    
    <td>{{product.id}}</td>
     <td> {{product.product_name}} | {{product.quantity}} </td>
     <td><span class="btn btn-danger" v-if="product.quantity===0">
       - out of stock
     </span></td>
    
      
      <td>{{product.product_code}}</td>
      <td>{{product.unit_buying_cost}}</td>
      <td>{{product.unit_selling_cost}}</td>
     
      <!-- <td>{{product.quantity * product.tax_rate}} </td> -->
      <td>{{product.tax_rate}}</td>
      <td>{{product.created_at}}</td>
      <td>{{product.updated_at}}</td>
     
    </tr>


</tbody>



</table>

<h4 class="text-success">Total Product:{{totalProduct}}</h4>

    </div>
    </div>

   
                

        
</template>

<script>
export default {
  data: function () {
    return {
      products: [],
      loading: true,
    };
  },

  mounted() {
    this.loadProducts();
  },

  methods: {
    loadProducts: function () {
      axios
        .get("/api/products")
        .then((response) => {
          this.products = response.data.data;
          this.loading = false;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },

computed:{
  totalProduct(){
    return this.products.reduce((sum,product)=>{
      return sum + product.quantity
    },0 )
  }
}


};
</script>
