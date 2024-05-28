<template>
  <Head title="Inventory Count" />
  <AuthenticatedLayout>
    <div class="w-full px-6 py-6 flex bg-gray-200">
      <div class="w-full flex flex-col gap-2">
        <div class="input_setup">
          <label for="branchName" class="input_label">Branch:</label>
          <input
            type="text"
            class="input_text"
            id="branchName"
            placeholder="Branch"
            name="branchName"
            value="GGM-office"
            disabled
          />
        </div>

        <div class="input_setup">
          <label for="partyName" class="input_label">Party:</label>
          <select
            name="partyName"
            id="partyName"
            class="input_select"
            v-model="selectedParty"
            @change="handlePartyChange"
          >
            <option disabled selected ><em>Select Party Name</em></option>
            <option
              v-for="(item, index) in parties"
              :key="index"
              :value="item.ID"
              >{{ item.Name }}</option
            >
          </select>
        </div>
        <div class="input_setup">
          <label for="subPartyName" class="input_label">Sub-Party:</label>
          <select name="partyName" class="input_select" id="subPartyName">
            <option><em>Select Sub-Party Name</em></option>
            <option
              v-for="(item, index) in filterSubparties"
              :key="index"
              :value="item.id"
              >{{ item.subPartyName }}</option
            >
          </select>
     
        </div>
      </div>

      <div class="w-full flex flex-col gap-2">
        <div class="input_setup">
          <label for="date" class="input_label"> Date:</label>
          <input
            type="date"
            class="input_text"
            id="date"
            v-model="todayDate"
            name="date"
            disabled
          />
        </div>
        <div class="input_setup">
          <label for="voucherNo" class="input_label">Voucher No:</label>
          <input
            type="text"
            class="input_text"
            id="voucherNo"
            placeholder="Voucher Number"
            name="voucherNo"
          />
        </div>
      </div>

      <div class="w-full flex flex-col gap-2">
        <div class="input_setup">
          <label for="poNo" class="input_label text-nowrap">Party PO No:</label>
          <input
            type="text"
            class="input_text"
            id="poNo"
            placeholder="Party PO No."
            name="poNo"
          />
        </div>

        <div class="input_setup">
          <label for="poDate" class="input_label"> PO Date:</label>
          <input type="date" class="input_text" id="poDate" name="poDate" />
        </div>

        <div class="input_setup">
          <label for="currency" class="input_label">Currency:</label>
          <select
            name="currency"
            id="currency"
            class="input_select"
            v-model="selectedValue"
          >
            <option
              v-for="(item, index) in currencies"
              :key="index"
              :value="item.id"
              >{{ item.Name }}</option
            >
          </select>
        </div>
      </div>
    </div>
    <!-- <div class="divider divider-primary"></div> -->
    <div>
      <div class="flex gap-4 bg-gray-400">
        <button
          class="px-4 py-2 min-w-32"
          @click="showTab('tab1')"
          :class="
            selectedTab == 'tab1'
              ? 'border-b-2 border-blue-800 text-white'
              : 'border-none'
          "
        >
          Details
        </button>
        <button
          class="px-4 py-2 text-nowrap min-w-32"
          @click="showTab('tab2')"
          :class="
            selectedTab == 'tab2'
              ? 'border-b-2 border-blue-800 text-white'
              : 'border-none'
          "
        >
          Party Information
        </button>
        <button
          class="px-4 py-2 min-w-32"
          @click="showTab('tab3')"
          :class="
            selectedTab == 'tab3'
              ? 'border-b-2 border-blue-800 text-white'
              : 'border-none'
          "
        >
          Logistics
        </button>
      </div>
      <div>
        <div v-if="selectedTab === 'tab1'" class="h-[30rem] flex flex-col">
          <div class="tabs px-6 flex items-center justify-center gap-2">
            <div class="flex flex-col justify-start">
              <label for="itemName" class="input_label">Item:</label>

              <select name="itemName" class="input_select" id="itemName"
              v-model="selectedItem"
            @change="handleItemChange">
                <option><em>Select Item</em></option>
                <option
                  v-for="(item, index) in itemsval"
                  :key="index"
                  :value="item.salesUnitID"
                  >{{ item.name }}</option
                >
              </select>
            </div>
            <div class="flex flex-col justify-start">
              <label for="unit" class="input_label">Unit:</label>
              <input
                type="text"
                class="input_text"
                id="unit"
                placeholder="Enter unit"
                name="unit"
                readonly
                :value="itemUnit?.name ?? '0'"
             
              />
      
            </div>
            <div class="flex flex-col justify-start">
              <label for="quantity" class="input_label">Quantity:</label>
              <input
                type="number"
                class="input_text"
                id="quantity"
                min="0"
                placeholder="Enter Quantity"
                name="quantity"
              />
            </div>
            <div class="flex flex-col justify-start">
              <label for="rate" class="input_label">Rate</label>
              <input
                type="number"
                class="input_text"
                id="rate"
                min="0"
                placeholder="Rate"
                name="rate"
                disabled
              />
            </div>
            <div class="flex flex-col justify-start">
              <label for="amount" class="input_label">Amount:</label>
              <input
                type="number"
                class="input_text"
                id="amount"
                min="0"
                placeholder="Enter Amount"
                name="amount"
                disabled
              />
            </div>
            <button
              class="px-4 py-5 mt-5 bg-gray-400 active:bg-gray-100 h-8 text-[14px] text-center flex items-center justify-center rounded-md text-white"
            >
              <span>Ok</span>
            </button>

          </div>


      <div class="flex justify-center gap-x-6">
        <div class="flex  gap-6">
          <div class="flex flex-col justify-start">
            <label for="salesvalue" class="input_label">Sales Value:</label>
            <input
              type="number"
              class="input_text1"
              id="salesvalue"
              placeholder="Enter Sales Value"
              name="salesvalue"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="stddiscount" class="input_label text-nowrap"
              >Std Dis.(%):</label
            >
            <input
              type="text"
              class="input_text1"
              id="stddiscount"
              placeholder="Enter std. discount (%)"
              name="stddiscount"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="adddiscount" class="input_label">Add Dis.(%):</label>
            <input
              type="text"
              class="input_text1"
              id="adddiscount"
              placeholder="Enter Add Discount (%)"
              name="adddiscount"
            />
          </div>
        </div>

        <div class="flex gap-6">
          <div class="flex flex-col justify-start">
            <label for="adddiscount" class="input_label text-nowrap"
              >Add Dis.(val):</label
            >
            <input
              type="number"
              class="input_text1"
              id="adddiscount"
              placeholder="Enter Add. Discount"
              name="adddiscount"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="spcdiscount" class="input_label text-nowrap"
              >Spc. Dis.(val):</label
            >
            <input
              type="number"
              class="input_text1"
              id="spcdiscount"
              placeholder="Enter Special Discount"
              name="spcdiscount"
            />
          </div>
          <div class="flex flex-col justify-start">
            <label for="billamount" class="input_label">Bill Amount:</label>
            <input
              type="number"
              class="input_text1"
              id="billamount"
              placeholder="Enter Bill Amount"
              name="billamount"
            />
          </div>
        </div>
      </div>
          <div class="overflow-auto px-6 border-2 mt-4">
            <table class="h-auto relative " id="customers">
              <thead class=" sticky top-0 ">
                <tr>
                  <th>S.No.</th>
                  <th>Item</th>
                  <th>Unit</th>
                  <th>DocQty</th>
                  <th>Rate</th>
                  <th>Process Qu...</th>
                  <th>Amount</th>
                  <th>Sub Item</th>
                  <th>Stk Qty</th>
                  <th>MDet</th>
                  <th>G Pack Unit</th>
                  <th>Grand Pack...</th>
                  <th>MDet2</th>
                  <th>MDet3</th>
                  <th>MD Barcode</th>
                  <th>Pack Unit</th>
                  <th>Pack Qty</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Item 1</td>
                  <td>Unit A</td>
                  <td>10</td>
                  <td>5.00</td>
                  <td>20</td>
                  <td>50.00</td>
                  <td>Sub Item 1</td>
                  <td>100</td>
                  <td>Detail 1</td>
                  <td>Pack A</td>
                  <td>Grand Pack A</td>
                  <td>Detail 2</td>
                  <td>Detail 3</td>
                  <td>123456789</td>
                  <td>Pack B</td>
                  <td>50</td>
                </tr>

                <tr>
                  <td>2</td>
                  <td>Item 2</td>
                  <td>Unit B</td>
                  <td>20</td>
                  <td>3.50</td>
                  <td>25</td>
                  <td>70.00</td>
                  <td>Sub Item 2</td>
                  <td>150</td>
                  <td>Detail 4</td>
                  <td>Pack C</td>
                  <td>Grand Pack B</td>
                  <td>Detail 5</td>
                  <td>Detail 6</td>
                  <td>987654321</td>
                  <td>Pack D</td>
                  <td>75</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div v-if="selectedTab === 'tab2'" class="tabs">
          <GeneralTab :salesExecutive="salesExecutive" :states="states" />
        </div>
        <div v-if="selectedTab === 'tab3'" class="tabs">
          <LogisticTab />
        </div>
      </div>
    </div>

    <div class="flex bg-gray-200 justify-between p-6">
      <div>
        <div class="input_setup">
          <label for="narration" class="input_label">Narration:</label>
          <textarea
            class="p-2 h-20 rounded-md border-2 border-black"
            id="narration"
            placeholder="Enter Narration"
            name="narration"
            cols="35"
            rows="5"
          />
        </div>
      </div>

    </div>

    <div class="flex justify-end pr-6 mb-6 py-2">
      <div class="flex gap-3">
        <button
          class="py-2 px-4 w-24 rounded-lg uppercase font-medium text-center bg-blue-500 text-white active:bg-blue-400"
        >
          Save
        </button>
        <button
          class="py-2 px-4 w-24 rounded-lg uppercase font-medium text-center bg-gray-700 text-white"
        >
          Cancel
        </button>
        <button
          class="py-2 px-4 w-24 rounded-lg uppercase font-medium text-center bg-red-500 text-white"
        >
          Exit
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
<script setup>
import GeneralTab from "@/Components/tabs/partyInformationTab/GeneralTab.vue";
import LogisticTab from "@/Components/tabs/logisticsTab/LogisticTab.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, usePage, router } from "@inertiajs/vue3";
import { ref } from "vue";
import { computed, onMounted } from "vue";

const { data, post } = usePage().props;

const props = defineProps([
  "branches",
  "parties",
  "subparties",
  "currencies",
  "itemsval",
  "unitsval",
  "salesExecutive",
  "states",
]);

const selectedParty = ref("Select Party Name");
const itemUnit = ref()
const selectedItem =ref("Select Item")

const filterSubparties = ref([]);

const handlePartyChange = () => {
  filterSubparties.value = props.subparties.filter(
    (item) => item.partyID == selectedParty.value
  );
};

const handleItemChange = () =>{

  itemUnit.value = props.unitsval.find((item)=>
  item.ID == selectedItem.value) 
 
}


const selectedTab = ref("tab1");
const selectedValue = ref("E2106F23-A92A-46EE-95BC-CE2806B93A39");
const showTab = (tab) => {
  selectedTab.value = tab;
};
const todayDate = ref(new Date().toISOString().substr(0, 10));
</script>

<style scoped>
.input_setup {
  @apply flex w-full items-center gap-x-2;
}
.input_setup label {
  @apply w-20 text-[14px];
}
.input_text {
  @apply outline-none border-2 border-gray-800 rounded-[5px] h-8 w-60 text-[14px] disabled:bg-slate-200 disabled:border-slate-500;
}
.input_select {
  @apply outline-none border-2 border-gray-800 rounded-[5px] h-8 w-60 py-0 px-4 text-[14px];
}
.input_select option {
  @apply outline-none text-[14px];
}

.tabs {
  @apply w-full flex items-start py-4 justify-center;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 14px;
}

#customers td,
#customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even) {
  background-color: #f2f2f2;
  text-wrap: nowrap;
}

#customers tr:hover {
  background-color: #ddd;
}

#customers th {
  padding-top: 12px;
  text-wrap: nowrap;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(156 163 175 / var(--tw-bg-opacity));
  color: white;
}
</style>
