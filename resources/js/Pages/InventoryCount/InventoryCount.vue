<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm,router } from "@inertiajs/vue3";
import Footer from '../../Components/Footer.vue';
import { ref } from 'vue'

const searchZone = ref();
const searchZoneMethod = () => {
    let chunks = [];
    let uniqueArr = [];
    let data = searchZone.value;   
    for (var i = 0, charsLength = data.length; i < charsLength; i += 24) {
        chunks.push(data.substring(i, i + 24));
    }    
    uniqueArr = chunks.filter((item, index) => chunks.indexOf(item) === index);
    let url = 'search-zones';
    var datas = {
        searchZoneScanValue: uniqueArr,
        warehouseId: 'MAA',
        clientId: 'HLL01',
    };
   router.get(url, datas)
};
 
</script>

<template>
    <Head title="Inventory Count" />

    <AuthenticatedLayout>
        <!-- Loader svg-->
      
        <!-- <div
       
        class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center"
      >
        <div
          class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 "
        ></div>
        <h2 class="text-center text-white text-xl font-semibold">Loading...</h2>
      </div> -->
        <!-- Loader Svg-->
        <div class="py-1">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="w-full p-1 flex justify-center font-sans">
                        <div class="rounded bg-grey-light p-2 bg-gray-200 w-screen">
                        <div class="flex justify-between py-1">
                            <h2 class="text-lg font-bold ml-1 text text-indigo-900">
                            Inventory Count
                            </h2>
                
                            <button
                            @click="$router.back()"
                            class="bg-slate-700 hover:bg-slate-600 hover:text-white text-white px-4 mr-2 rounded outline outline-offset-2 outline-slate-700 cursor-pointer"
                            >
                            Back
                            </button>
                        </div>
                        </div>
                    </div>
                    <!-- Zone Search Code-->
                    <div class="bg-white p-2 rounde2remd  border-b border-grey h-22">
                        <div class="grid grid-flow-row-dense">
                        <label
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
                            >Search</label
                        >
                        <div class="relative">
                            <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                            >
                            <svg
                                aria-hidden="true"
                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                ></path>
                            </svg>
                            </div>
                            <input
                            type="search"
                            name="search-asn"
                            id="searchAsn"
                            autocomplete="off"
                            v-model="searchZone"
                            @keyup.enter="searchZoneMethod()"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder=" Scan Zone (*)"
                            required
                            />
                            <button
                            type="sbumit"
                            @click.prevent="searchZoneMethod()"
                            class="text-white absolute right-2.5 bottom-1.5 bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-700 font-medium rounded-lg text-sm px-4 py-2 slate:bg-slate-600 slate:hover:bg-slate-700 slate:focus:ring-slate-800"
                            >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                ></path>
                            </svg>
                            </button>
                        </div>
                        </div>
                    </div>
                    <!-- Zone Search Code End-->                    
                </div>
            </div>            
        </div>
        <Footer></Footer>
    </AuthenticatedLayout>
</template>
