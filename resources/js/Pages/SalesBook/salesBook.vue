<template> 
    <Head title="Inventory Count" />
    <AuthenticatedLayout>      
        <!-- <div class="grid grid-cols-3 gap-3 ml-5 mt-5">
            <div class="p-3">  
                    <select class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-2 py-1 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-2 text-sm" style="width: 175px;">
                        <option value="0">Select Branch</option>
                        <option v-for="branch in props.branches" :key="branch.id" >{{ branch.name }} - {{ branch.code  }} - </option>
                    </select> 
                      <input type="datetime-local" v-model="value" class="px-1 py-1 pr-6 rounded shadow mb-2 text-sm" />
                
                    <select class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-2 py-1 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-2 text-sm" style="width: 175px;">
                        <option value="0">Select Party</option>
                        <option v-for="party in props.parties" :key="party.id" >{{ party.Name }} </option>
                    </select> 

                    <select class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-2 py-1 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-2 text-sm" style="width: 175px;">
                        <option value="0">Sub Party</option>
                        <option v-for="subparty in props.subparties" :key="subparty.id" >{{ subparty.Name }} </option>
                    </select>  
                </div>                  
                
            <div>

                Voucher No. <input type="text" class="w-20 px-1 py-1  rounded"><input type="text" class="w-20 px-1 py-1 pr-8 rounded"> <input type="text" class="w-20 px-1 py-1  rounded"><br />
                Party PO No. <input type="text" class="w-20 px-1 py-1   rounded mt-2"><input type="text" class="w-20 mt-2 px-1 py-1 rounded">  <br />
                Requestion:  <input type="text" class="w-20 px-1 py-1   rounded mt-2"><input type="text" class="w-20 mt-2 px-1 py-1 rounded"> 
            </div>
             
            <div>
                <select class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-2 py-1 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-2 text-sm" style="width: 175px;">
                        <option value="0">Select Currency</option>
                        <option v-for="currency in props.currencies" :key="currency.id" >{{ currency.Name }} </option>
                    </select>  
                Conversion    <input type="text" class=" px-1 py-1   rounded mt-2">
                
            </div>
        </div>
  -->
 
    
  <v-app>
    <div class="w-full flex items-center flex-col h-full px-4 py-4">
      <div
        class="flex w-full flex-col sm:flex-row sm:flex-wrap justify-between border-b-2solo-inverted px-10"
      >
        <!-- Branch -->
        
        <div>
          <v-autocomplete
            class="w-full   min-w-[10vw] sm:max-w-[25vw]"
            label="Branch"
            :items="props.branches.map((item)=>`${item.name} - ${item.code} -`)"
            color="primary"
            variant="solo-filled"
            bgColor="#F5F5F5"
            density="compact"
             
            
          />
          <v-text-field
            class="w-full min-w-[15vw] sm:max-w-[25vw]"
            label="date"
            variant="solo-filled"
            density="compact"
            :model-value="value"
            bgColor="#E0E0E0"
            readonly
            
          /> 
          <v-autocomplete 
            class="w-full min-w-[15vw] sm:max-w-[25vw]"
            label="Party"
            bgColor="#F5F5F5"
            density="compact"
            color="primary"
            :items="props.parties.map((item)=>`${item.Name}`)"
            variant="solo-filled"
          />
          <v-autocomplete
            class="w-full min-w-[15vw] sm:max-w-[25vw]"
            label="Sub-Party"
            color="primary"
            density="compact"
            bgColor="#F5F5F5"
            :items="props.subparties.map((item)=>`${item.Name}`)"
            variant="solo-filled"
          />
        </div>

        <div>
          <div class="flex gap-1">
            <v-text-field
              class="w-full min-w-[8vw] sm:max-w-[25vw]"
              label="Voucher No"
              density="compact"
              variant="solo-filled"
              bgColor="#ebb113"
              readonly
            />

            <v-text-field
              class="w-full min-w-[8vw] sm:max-w-[25vw]"
              density="compact"
              label=" "
              variant="solo-filled"
              bgColor="#ebb113"
               
            />

            <v-text-field
              class="w-full min-w-[8vw] sm:max-w-[25vw]"
              density="compact"
              label=" "

              variant="solo-filled"
              bgColor="#E0E0E0"
              readonly
            />
          </div>
          <div class="flex gap-1">
            <v-text-field
              class="w-full min-w-[8vw] sm:max-w-[25vw]"
              label="Party PO No."
              density="compact"
              variant="solo-filled"
              bgColor="#E0E0E0"
            />

            <v-text-field
              class="w-full min-w-[8vw] sm:max-w-[25vw] h-16"
              density="compact"
              variant="solo-filled"
              bgColor="#E0E0E0"
              label=" "
            />
          </div>
         
          <div class="flex gap-1">
            <v-text-field
              class="w-full min-w-[8vw] sm:max-w-[25vw]"
              label="Requisition"
              density="compact"
              variant="solo-filled"
              bgColor="#E0E0E0"
            />

            <v-text-field
              class="w-full min-w-[8vw] sm:max-w-[25vw]"
              density="compact"
              variant="solo-filled"
              bgColor="#E0E0E0"
              label=" "
            />
          </div>
        </div>

        <!-- Party -->

        <div>
          <v-autocomplete
            class="w-full min-w-[15vw] sm:max-w-[25vw]"
            label="Currency"
            color="primary"
            :items="props.currencies.map((item)=>`${item.Name}`)"
            density="compact"
            bgColor="#F5F5F5"
            variant="solo-filled"
            
          />
          <v-text-field
            class="w-full min-w-[15vw] sm:max-w-[25vw]"
            label="Conversion Rate"
            variant="solo-filled"
            model-value="Rs. 100000"
            density="compact"
            bgColor="#E0E0E0"
            readonly
          />
        </div>
      
      </div>

      <br />

      <div class="flex w-full">
     <Form1Tabs :itemval="props.itemsval" :unitsval="props.unitsval" :salesExecutive="props.salesExecutive" :states="states"/>  
      </div>
      <div id="btnClick"></div>
      <div class=""></div>
    </div>
  </v-app>
 
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm,router } from "@inertiajs/vue3";
import Footer from '../../Components/Footer.vue'; 
import { ref,onMounted } from 'vue';
import Form1Tabs from '../../Components/tabs/Form1Tabs.vue'

const props = defineProps(['branches','parties','subparties','currencies','itemsval','unitsval','salesExecutive','states'])

 
const date = new Date().toLocaleDateString();

// using an existing datetime as `v-model` you must format its value to 'YYYY-MM-DDThh:mm'

const formattedDate =date;
// '2023-07-27T09:20' bn-IN

const value = ref(formattedDate)
 
</script>

<style scoped>
.btn{
  @apply py-2 px-4 bg-blue-400 active:bg-blue-200 rounded-md;
}
.input{
  font-size: 10px;
}
</style>

 
 