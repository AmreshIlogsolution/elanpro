<template>
  <v-card flat>
    <v-data-table-virtual
      density="compact"
      :headers="headers"
      :items="desserts"
    ></v-data-table-virtual>
  </v-card>
</template>

<script setup lang="ts">
const headers: any[] = [
  {
    align: "start",
    key: "name",
    sortable: false,
    title: "Dessert (100g serving)",
  },
  { key: "calories", title: "Calories" },
  { key: "fat", title: "Fat (g)" },
  { key: "carbs", title: "Carbs (g)" },
  { key: "protein", title: "Protein (g)" },
  { key: "iron", title: "Iron (%)" },
];
const desserts: any[] = [
  {
    name: "Frozen Yogurt",
    calories: 159,
    fat: 6.0,
    carbs: 24,
    protein: 4.0,
    iron: 1,
  },
  {
    name: "Ice cream sandwich",
    calories: 237,
    fat: 9.0,
    carbs: 37,
    protein: 4.3,
    iron: 1,
  },
  {
    name: "Eclair",
    calories: 262,
    fat: 16.0,
    carbs: 23,
    protein: 6.0,
    iron: 7,
  },
  {
    name: "Cupcake",
    calories: 305,
    fat: 3.7,
    carbs: 67,
    protein: 4.3,
    iron: 8,
  },
  {
    name: "Gingerbread",
    calories: 356,
    fat: 16.0,
    carbs: 49,
    protein: 3.9,
    iron: 16,
  },
  {
    name: "Jelly bean",
    calories: 375,
    fat: 0.0,
    carbs: 94,
    protein: 0.0,
    iron: 0,
  },
];
</script>
