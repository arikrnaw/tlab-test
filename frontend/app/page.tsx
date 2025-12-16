"use client";

import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table";
import { Button } from "@/components/ui/button";

import { useEffect, useState } from "react";
type Resep = {
  id: number;
  nama_resep: string;
  id_kategori_makanan: number;
  deskripsi: string;
};

// export const api = axios.create({
//   baseURL: process.env.NEXT_PUBLIC_API_URL || "http://localhost:8000/api",
//   headers: {
//     "Content-Type": "application/json",
//   },
// });

// const resepApi = {
//   create: (data: Resep) => api.post("/resep", data),
// };

// const handleSubmit = async (event: React.FormEvent) => {
//   event.preventDefault();
//   try {
//     const response = await fetch("/api/resep", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify(resepApi),
//     });
//     if (!response.ok) {
//       throw new Error("Failed to create resep");
//     }
//   } catch (error) {
//     console.error(error);
//   }
// };

export default function DaftarResep() {
  const [resep, setResep] = useState<Resep[]>([]);
  const [kategoriMakanan, setKategoriMakanan] = useState<string[]>([]);

  useEffect(() => {
    const fetchResep = async () => {
      const response = await fetch("http://localhost:8000/api/resep");
      const data = await response.json();
      setResep(data);
    };
    fetchResep();
  }, []);

  useEffect(() => {
    const fetchKategoriMakanan = async () => {
      const response = await fetch("http://localhost:8000/api/kategori");
      const data = await response.json();
      setKategoriMakanan(data);
    };
    fetchKategoriMakanan();
  }, []);

  return (
    <div>
      <Button>Submit</Button>
      <TableCaption>Daftar Resep</TableCaption>
      <Table>
        <TableHeader>
          <TableRow>
            <TableHead className="w-[100px]">ID</TableHead>
            <TableHead>Nama Resep</TableHead>
            <TableHead>Kategori Makanan</TableHead>
            <TableHead>Deskripsi</TableHead>
          </TableRow>
        </TableHeader>
        <TableBody>
          {resep.map((resep) => (
            <TableRow key={resep.id}>
              <TableCell className="font-medium">{resep.id}</TableCell>
              <TableCell>{resep.nama_resep}</TableCell>
              <TableCell>{resep.id_kategori_makanan}</TableCell>
              <TableCell>{resep.deskripsi}</TableCell>
            </TableRow>
          ))}
        </TableBody>
      </Table>
    </div>
  );
}
