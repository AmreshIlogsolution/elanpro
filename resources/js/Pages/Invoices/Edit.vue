<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm, Link,router } from "@inertiajs/vue3";

const props = defineProps({
  invoice: {
    type: Object,
    default: () => ({}),
  },
});

const form = useForm({
  id: props.invoice['id'],
  invoice_number: props.invoice['invoice_number'],
  invoice_amount: props.invoice['invoice_amount'],
  invoice_image: props.invoice['invoice_image'],
  invoice_coverLetter_image: props.invoice['invoice_coverLetter_image'],
  
});
const uploadInvoiceImage = (event) => {
   
    form.invoice_image = event.target.files[0];
   
}

const submit = () => {  
  console.log(form.invoice_image);
  //form.put(route("invoices.update", props.invoice['id']));
  //form.put(route("invoices.update", props.invoice['id']));
 
  router.post(`/invoices/${props.invoice['id']}`, {
  _method: 'put',
  form,
})
};
</script>

<template>
  <Head title="Blog Edit" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Invoice Edit
      </h2>
    </template>
    
    <div class="py-5 bg-gray-200">
      <div class="mx-auto max-w-[1200px]">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form @submit.prevent="submit" > 
              <div
                class="border-2 p-5 my-6 border-gray-400 rounded-md flex flex-col gap-y-4"
              >
                <div class="flex flex-wrap md:flex-nowrap gap-4 justify-around">
                  <div>
                    <InputLabel for="invoice_number" value="Invoice Number" />
                    <TextInput
                      id="invoice_number"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.invoice_number"
                      autofocus
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.invoice_number"
                    />
                  </div>
                  <div>
                    <InputLabel for="Invoice_Amount" value="Invoice Amount" />
                    <TextInput
                      id="Invoice_Amount"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.invoice_amount"
                      autofocus
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.invoice_amount"
                    />
                  </div>
                  <div>
                    <InputLabel for="Invoice_Image" value="Invoice Image" />
                    <embed
                      type="image/jpg"
                      :src="invoice['invoice_image']"
                      width="200"
                      height="100"
                    />
                    
                    <input type="file" name="invoice_image"  @input="form.invoice_image = $event.target.files[0]" />
                  </div>
                  <div>
                    <InputLabel for="Invoice Cover Image" value="Invoice Cover " />
                    <embed
                      type="image/jpg"
                      :src="invoice['invoice_coverLetter_image']"
                      width="200"
                      height="100"
   
                    /> 
                    <Input
                        type="file"
                        name="invoice_coverLetter_image" @input="form.invoice_coverLetter_image = $event.target.files[0]"
                       
                      />
                  </div>
                </div>
              </div>
              <PrimaryButton
                type="submit"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Update
              </PrimaryButton>
              <Link
                :href="route('invoices.index')"
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