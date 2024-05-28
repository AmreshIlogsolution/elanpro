<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";

console.log("router: ", router);
import { ref } from "vue";
import Button from "@/Components/ui/button/Button.vue";

const term = ref();

const props = defineProps({
  invoices: {
    type: Object,
    default: () => ({}),
  },
});

const filteredinvoice = ref(props.invoices.data);

const handleInput = () => {
  router.get("/invoices", { term: term.value }, { preserveState: true });
};

console.log("this is a list of invoices", props.invoices);
const form = useForm({});

function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
    form.delete(route("invoices.destroy", id));
  }
}
</script>

<template>
  <Head title="Invoices" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Invoic Index
      </h2>
    </template>

    <div class="py-5 bg-gray-200">
      <div class="mx-auto max-w-[1200px]">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
              <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-b border-gray-200">
                  <div class="mb-2">
                    <Link :href="route('invoices.create')">
                      <SuccessButton>Add Invoice</SuccessButton>
                    </Link>                    
                  </div>
                  <div>
                    <input
                      id="search"
                      type="text"
                      v-model="term"
                      @input="handleInput"
                      @keyup="searchInvoice"
                    />
                  </div>
                  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table
                      class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                      <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                      >
                        <tr>
                          <th scope="col" class="px-6 py-3 text-sm/[12px]">
                            Number
                          </th>
                          <th scope="col" class="px-6 py-3 text-sm/[12px]">
                            Amount
                          </th>
                          <th scope="col" class="px-6 py-3 text-sm/[12px]">
                            Date
                          </th>
                          <th scope="col" class="px-6 py-3 text-sm/[12px]">
                            Invoic Image
                          </th>
                          <th scope="col" class="px-6 py-3 text-sm/[12px]">
                            Invoic Cover Image
                          </th>

                          <th scope="col" class="px-6 py-3 text-sm/[12px]">
                            Edit
                          </th>
                          <!-- <th scope="col" class="px-6 py-3 text-sm/[12px]" >
                                  Delete
                          </th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="(invoice, index) in invoices.data"
                          :key="index"
                          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                        >
                          <td
                            scope="row"
                            class="px-4 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap text-sm"
                          >
                            {{ invoice.invoice_number }}
                          </td>
                          <td
                            scope="row"
                            class="px-4 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap text-sm"
                          >
                            {{ invoice.invoice_amount }}
                          </td>
                          <td
                            scope="row"
                            class="px-4 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap text-sm"
                          >
                            {{ invoice.invoice_date }}
                          </td>
                          <td
                            scope="row"
                            class="px-4 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap text-sm"
                          >
                            <a :href="invoice.invoice_image" target="_blank">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512"
                                width="20"
                                height="20"
                              >
                                <path
                                  d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"
                                />
                              </svg>
                            </a>
                          </td>
                          <td
                            scope="row"
                            class="px-4 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap text-sm"
                          >
                            <a
                              :href="invoice.invoice_coverLetter_image"
                              target="_blank"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512"
                                width="20"
                                height="20"
                              >
                                <path
                                  d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"
                                /></svg>
                            </a>
                          </td>

                          <td class="px-4 py-2">
                            <Link
                              :href="`/invoices/${invoice.id}/edit`"
                              class="px-4 py-2 text-white bg-yellow-500 rounded-lg"
                              >Edit
                            </Link>
                          </td>
                          <!-- <td class="px-4 py-2">
                                <DangerButton
                                        class="bg-red-700"
                                        @click="destroy(invoice.id)"
                                >Delete</DangerButton>
                        </td> -->
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <pagination class="mt-6" :links="invoices.links" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
