<template>

  <div class=" flex flex-col justify-center items-center w-full">


  <div class="flex w-full justify-between p-6">
    <div class="flex flex-col gap-2">
      <div class="flex flex-col justify-start">
        <label for="billingadd" class="input_label selection text-10">Billing Add.:</label>
        <textarea
          class="p-2 h-16 rounded-md border-2 border-black"
          id="billingadd"
          placeholder="Enter Billing Address"
          name="billingadd"
          cols="36"
          rows="3"
        />
      </div>

      <div class="flex gap-4">
        <div class="flex flex-col gap-2">
          <div class="flex flex-col justify-start">
            <label for="billinggstno" class="input_label">GST No:</label>
            <input
              type="text"
              class="input_text"
              id="billinggstno"
              placeholder="Enter GST No."
              name="billinggstno"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="billingpanno" class="input_label text-nowrap"
              >Pan No.</label
            >
            <input
              type="text"
              class="input_text"
              id="billingpanno"
              placeholder="Enter Pan no"
              name="billingpanno"
            />
          </div>
          <div class="flex flex-col justify-start">
          <label for="salesexecutive" class="input_label text-nowrap">Sales Exec:</label>
          <select name="salesexecutive" id="salesexecutive" class="input_select">
            <option selected disabled><em>Select Sales Execuitve</em></option>
            <option
              v-for="(item, index) in salesExecutive"
              :key="index"
              :value="item.name"
              >{{ item.name }}</option
            >
          </select>
        </div>
        <div class="flex flex-col justify-start">
            <label for="city" class="input_label">City:</label>
            <input
              type="text"
              class="input_text"
              id="city"
              placeholder="Enter City"
              name="city"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="zipcode" class="input_label text-nowrap"
              >Zipcode:</label
            >
            <input
              type="number"
              class="input_text"
              id="zipcode"
              placeholder="Enter zipcode"
              name="zipcode"
            />
          </div>
        </div>

        <div class="flex flex-col gap-2">
          <div class="flex flex-col justify-start">
            <label for="billingpersonname" class="input_label text-nowrap"
              >Person Name:</label
            >
            <input
              type="text"
              class="input_text"
              id="billingpersonname"
              placeholder="Enter Contact Person Name"
              name="billingpersonname"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="billingpersonno" class="input_label text-nowrap"
              >Person Ph.No.:</label
            >
            <input
              type="number"
              class="input_text"
              id="billingpersonno"
              placeholder="Enter Contact Person Number"
              name="billingpersonno"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="billingpersonemail" class="input_label text-nowrap"
              >Person E-mail:</label
            >
            <input
              type="email"
              class="input_text"
              id="billingpersonemail"
              placeholder="Enter Contact Person E-mail"
              name="billingpersonemail"
            />
          </div>
        
          <div class="flex flex-col justify-start">
            <label for="billingstate" class="input_label text-nowrap"
              >State:</label
            >
            <input
              type="text"
              class="input_text"
              id="billingstate"
              placeholder="Enter state"
              name="billingstate"
            />
          </div>
         
        </div>
      
      </div>
    </div>

    <div class="flex flex-col gap-2 ">
      <div class="flex flex-col justify-start ">
        <label for="deliveryadd" class="input_label text-nowrap">Delivery Add.:</label>
        <textarea
          class="p-2 h-16 rounded-md border-2 border-black"
          id="deliveryadd"
          placeholder="Enter Delivery Address"
          name="deliveryadd"
          cols="30"
          rows="3"
        />
      </div>

      <div class="flex gap-4"> 
        <div class="flex flex-col gap-2">
          <div class="flex flex-col justify-start">
            <label for="storename" class="input_label">Store Name:</label>
            <input
              type="text"
              class="input_text"
              id="storename"
              placeholder="Enter Store Name"
              name="storename"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="deliverygstno" class="input_label">GST No:</label>
            <input
              type="text"
              class="input_text"
              id="deliverygstno"
              placeholder="Enter GST No."
              name="deliverygstno"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="deliverypanno" class="input_label text-nowrap"
              >Pan No.</label
            >
            <input
              type="text"
              class="input_text"
              id="deliverypanno"
              placeholder="Enter Pan no"
              name="deliverypanno"
            />
          </div>
         
 
          <div class="flex flex-col justify-start">
          <label for="deliverystate" class="input_label text-nowrap">Delivery State:</label>
          <select name="deliverystate" id="deliverystate" class="input_select">
            <option selected disabled><em>Select Delivery States</em></option>
            <option
              v-for="(item, index) in states"
              :key="index"
              :value="item.name"
              >{{ item.name }}</option
            >
          </select>
        </div>
        </div>

        <div class="flex flex-col gap-2">
          <div class="flex flex-col justify-start">
            <label for="deliverypersonname" class="input_label text-nowrap"
              >Person Name:</label
            >
            <input
              type="text"
              class="input_text"
              id="deliverypersonname"
              placeholder="Enter Contact Person Name"
              name="deliverypersonname"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="deliverypersonno" class="input_label text-nowrap"
              >Person Ph.No.:</label
            >
            <input
              type="number"
              class="input_text"
              id="deliverypersonno"
              placeholder="Enter Contact Person Number"
              name="deliverypersonno"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="deliverypersonemail" class="input_label text-nowrap"
              >Person E-mail:</label
            >
            <input
              type="email"
              class="input_text"
              id="deliverypersonemail"
              placeholder="Enter Contact Person E-mail"
              name="deliverypersonemail"
            />
          </div>
        
         
         
        </div>
      
      </div>
    </div>
  </div>

  <div class=" flex items-center justify-center w-full">
    <div class="flex flex-col justify-start p-3">
          <label for="paymentmode" class="input_label text-nowrap ">Payment Mode:</label>
          <select name="paymentmode" id="paymentmode" class="input_select">
            <option><em>Select Payment Mode</em></option>
            <option
              v-for="(item, index) in parties"
              :key="index"
              :value="item.id"
              >{{ item.Name }}</option
            >
          </select>
        </div>

        <div class="flex flex-col justify-start p-3">
          <label for="utrno" class="input_label">URT No.:</label>
          <input
            type="text"
            class="input_text"
            id="utrno"
            placeholder="Enter UTR No"
            name="utrno" 
          />
        </div>
        <div class="flex flex-col justify-start p-3">
          <label for="payterm" class="input_label">Pay Terms:</label>
          <select name="payterm" id="payterm" class="input_select">
            <option><em>Select Pay Term</em></option>
            <option
              v-for="(item, index) in parties"
              :key="index"
              :value="item.id"
              >{{ item.Name }}</option
            >
          </select>
        </div>
        <div class="flex flex-col justify-start p-3">
          <label for="creditdays" class="input_label">credit Days:</label>
          <input
            type="number"
            class="input_text"
            id="creditdays"
            placeholder="Enter credit Days"
            name="creditdays"
          
          />
        </div>
  </div>
</div>
</template>

<script setup>
defineProps({
  salesExecutive: {
    required: true,
  },
  states: {
    required: true,
  },
});
</script>
