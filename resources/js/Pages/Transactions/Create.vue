<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import Checkbox from "@/Components/Checkbox.vue";
import {ref } from 'vue'
const showpage = ref<Boolean>(true);

const props = defineProps({
  invoices: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  invoiceNumber: "",
  invoiceAmount: "",
  invoiceUpload: "",
  invoiceCoverLetter :''
});

const submit = () => {
  alert('hello');
  form.post(route("invoices.store"));
};

 
</script>

<template>
  <Head title="Invoice Create" />

  <AuthenticatedLayout >
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Invoice Create
      </h2>
    </template>

    <div class="py-5 bg-gray-200" >
      <div class="mx-auto max-w-[1200px]">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form @submit.prevent="submit" enctype="multipart/form-data">
              <!-- <PrimaryButton type="button" @click="toggle">
                Add Transaction / Scan
              </PrimaryButton> -->

             

              <div  
                class="border-2 p-5 my-6 border-gray-400 rounded-md flex flex-col gap-y-4"
              >
                <div class="flex flex-wrap md:flex-nowrap gap-4 justify-around">
                  <div>
                    <InputLabel for="InvoiceNumber" >Invoice Number <span class=" text-red-500">(*)</span></InputLabel>
                    <TextInput
                      id="invoiceNumber"
                      type="text"
                      class="mt-1 w-96 block border border-gray-500"
                      v-model="form.invoiceNumber"
                      required
                      autofocus
                      autocomplete=""
                    />
                    <InputError class="mt-2" :message="form.errors.invoiceNumber" />
                  </div>
                  <div>
                    <InputLabel for="InvoiceAmount">Invoice Amount<span class=" text-red-500">(*)</span></InputLabel>
                    <TextInput
                      id="invoiceAmount"
                      type="text"
                      class="mt-1 block w-96 border border-gray-500"
                      v-model="form.invoiceAmount"
                      required
                      autofocus
                      autocomplete=""
                    />
                    <InputError class="mt-2" :message="form.errors.invoiceAmount" />
                  </div>
                  
                  <!-- <div>04</div> -->
                </div>
 

                <div class="flex flex-wrap md:flex-nowrap gap-4 justify-around">
                  <div>
                    <InputLabel for="inDate" >Upload Invoice <span class=" text-red-500">(*)</span></InputLabel>
                    <TextInput
                      id="invoiceUpload"
                      type="file"
                      class="mt-1 block w-96 border border-gray-500"
                      v-model="form.invoiceUpload"
                      required
                      autofocus
                      autocomplete="invoiceUpload"
                    />
                    <InputError class="mt-2" :message="form.errors.invoiceUpload" />
                  </div>
 
                  <div>
                    <InputLabel for="invoiceCoverLetter" value="Upload Cover Letter" />
                    <TextInput
                      id="invoiceCoverLetter"
                      type="file"
                      class="mt-1 block w-96 border border-gray-500"
                      v-model="form.invoiceCoverLetter"
                      required
                      autofocus
                      autocomplete="invoiceCoverLetter"
                    />
                    <InputError class="mt-2" :message="form.errors.invoiceCoverLetter" />
                  </div>
  
                </div>
              </div>
              <!-- 
                <div>
                                <InputLabel for="title" value="Title" />
                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.lr"
                                    required
                                    autofocus
                                    autocomplete="username"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.title"
                                />
                </div>

                <div class="my-6">
                                <label
                                    for="content"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Content</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.content"
                                    name="content"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.content"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.content }}
                                </div>
                </div> -->
              <PrimaryButton
                type="submit"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Add Invoice
              </PrimaryButton>

              <Link
                :href="route('transactions.index')"
                class="px-4 py-2 ml-3 text-white bg-gray-600 rounded-lg"
                >Cancel</Link
              >
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
