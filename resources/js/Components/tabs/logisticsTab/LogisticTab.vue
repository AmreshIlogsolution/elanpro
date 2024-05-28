<template>
  <div class="flex justify-around w-full">
    <div class=" flex flex-col gap-2"> 
      <div class="input_setup">
        <label for="destination" class="input_label">Destination:</label>

        <select name="destination" class="input_select" id="destination">
          <option disabled selected><em>Select Destination</em></option>
          <option v-for="(item, index) in items" :key="index" :value="item">{{
            item
          }}</option>
        </select>
      </div>
      <div class="input_setup">
        <label for="placeofsupply" class="input_label text-nowrap">Supply Place:</label>
        <input
          type="text"
          class="input_text"
          id="placeofsupply"
          placeholder="Enter place of supply"
          name="placeofsupply"
        />
      </div>
      <div class="input_setup">
        <label for="dispatchmode" class="input_label text-nowrap">Dispath mode:</label>

        <select name="dispatchmode" class="input_select" id="dispatchmode">
          <option disabled selected><em>Select Dispath Mode</em></option>
          <option v-for="(item, index) in items" :key="index" :value="item">{{
            item
          }}</option>
        </select>
      </div>
      <div class="input_setup">
        <label for="marka" class="input_label text-nowrap">Marka:</label>
        <input
          type="text"
          class="input_text"
          id="marka"
          placeholder="Enter marka"
          name="marka"
        />
      </div>
      <div class="input_setup">
        <label for="deliverypriority" class="input_label text-nowrap">Priority:</label>

        <select name="deliverypriority" class="input_select" id="deliverypriority">
          <option disabled selected><em>Select Delivery Priority</em></option>
          <option v-for="(item, index) in items" :key="index" :value="item">{{
            item
          }}</option>
        </select>
      </div>
    </div>



    <div class=" flex flex-col gap-2"> 
      <div class="input_setup">
        <label for="incoterms" class="input_label">INCO Term:</label>

        <select name="incoterms" class="input_select" id="incoterms">
          <option disabled selected><em>Select INCO Term</em></option>
          <option v-for="(item, index) in items" :key="index" :value="item">{{
            item
          }}</option>
        </select>
      </div>
      <div class="input_setup">
        <label for="incoplace" class="input_label text-nowrap">INCO Place:</label>
        <input
          type="text"
          class="input_text"
          id="incoplace"
          placeholder="Enter INCO Place"
          name="incoplace"
        />
      </div>
      <div class="input_setup">
        <label for="transporter" class="input_label text-nowrap">Transporter:</label>

        <select name="transporter" class="input_select" id="transporter">
          <option disabled selected><em>Select Transporter</em></option>
          <option v-for="(item, index) in items" :key="index" :value="item">{{
            item
          }}</option>
        </select>
      </div>
      <div class="input_setup">
        <label for="totalnetweight" class="input_label text-nowrap">Total NW.:</label>
        <input
          type="number"
          class="input_text"
          id="totalnetweight"
          placeholder="Enter Total Net Weight"
          name="totalnetweight"
        />
      </div>
      <div class="input_setup">
        <label for="totalgrossweight" class="input_label text-nowrap">Total GW.:</label>
        <input
          type="number"
          class="input_text"
          id="totalgrossweight"
          placeholder="Enter Total Gross Weight"
          name="totalgrossweight"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
const items = ["apple", "ball", "cat", "dog"];
</script>
