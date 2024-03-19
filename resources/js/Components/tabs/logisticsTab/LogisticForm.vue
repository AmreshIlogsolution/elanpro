<template>
 
    <div
      class="flex w-full flex-col md:flex-row justify-between gap-4 items-center"
    >
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Destination"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Place of Loading"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Place of supply"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
    </div>
    <div
      class="flex w-full flex-col md:flex-row justify-between gap-4 items-center"
    >
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Origin Country"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Destination Country"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Order Status"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
    </div>
    <div
      class="flex w-full flex-col md:flex-row justify-between gap-4 items-center"
    >
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Dispatch Mode"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
      <div class="flex w-full lg:max-w-[35vw] gap-1">
        <v-text-field
          class="w-full min-w-[8vw] lg:max-w-[35vw] h-16"
          label="Shipping No."
          density="compact"
          variant="solo-filled"
          bgColor="#E0E0E0"
        />

        <v-text-field
          class="w-full min-w-[8vw] lg:max-w-[35vw] h-16"
          density="compact"
          variant="solo-filled"
          bgColor="#E0E0E0"
        />
      </div>
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="C & F Agent"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
    </div>
    <div
      class="flex w-full flex-col md:flex-row justify-between gap-4 items-center"
    >
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Vehicle Number"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Vehicle Category"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Delivery Priority"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
    </div>
    <div
      class="flex w-full flex-col md:flex-row justify-between gap-4 items-center"
    >
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="INCO Terms"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="INCO Place"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
      <v-autocomplete
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Transporter"
        :items="data"
        color="primary"
        variant="solo-filled"
        bgColor="#F5F5F5"
        density="compact"
      />
    </div>
    <div
      class="flex w-full flex-col md:flex-row justify-between gap-4 items-center"
    >
      <div class="flex w-full lg:max-w-[35vw] gap-1">
        <v-text-field
          class="w-full min-w-[8vw] lg:max-w-[35vw] h-16"
          label="Distance"
          density="compact"
          model-value="0"
          type="number"
          variant="solo-filled"
          bgColor="#E0E0E0"
        />

        <v-text-field
          class="w-full min-w-[8vw] lg:max-w-[35vw] h-16"
          density="compact"
          label="Marka"
          variant="solo-filled"
          bgColor="#E0E0E0"
        />
      </div>
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Total CBM"
        type="number"
        model-value="0.000"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Volume Weight"
        type="number"
        model-value="0.000"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
    </div>
    <div
      class="flex w-full flex-col md:flex-row justify-between gap-4 items-center"
    >
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="No of Boxes/Packets"
        type="number"
        model-value="0.000"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Total Net Weight"
        type="number"
        model-value="0.000"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
      <v-text-field
        class="w-full min-w-[15vw] lg:max-w-[35vw] h-16"
        label="Total Gross Weight"
        type="number"
        model-value="0.000"
        variant="solo-filled"
        density="compact"
        bgColor="#E0E0E0"
      />
    </div>
 
</template>

<script setup lang="ts">
const data: String[] = [
  "California",
  "Colorado",
  "Florida",
  "Georgia",
  "Texas",
  "Wyoming",
];
</script>
