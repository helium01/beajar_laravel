<!DOCTYPE html>
<html>

<head>
    <title>Data Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Data Diri</h1>
        <button type="submit" class="btn btn-primary my-2" id="create" onclick="showForm2()">Create Data </button>
        <form id="form" class="mb-5 " style="display: none;">
            <input type="text" id="nama" placeholder="Nama" class="form-control my-2" required>
            <div id="alert"></div>
            <input type="text" id="nim" placeholder="NIM" class="form-control my-2" required>
            <input type="text" id="alamat" placeholder="Alamat" class="form-control my-2" required>
            <input type="text" id="prodi" placeholder="Prodi" class="form-control my-2" required>
            <input type="number" id="ipk" step="0.01" max="4.0" placeholder="IPK" class="form-control my-2" required>
            <input type="number" id="semester" placeholder="Semester" max="14" class="form-control my-2" required>
            <button type="submit" class="btn btn-primary my-2" id="submitBtn">Submit</button>
        </form>
        <div id="data-list"></div>
        <div id="pagination" class="mt-3">
            <button class="btn btn-secondary" onclick="prevPage()">Previous</button>
            <span id="currentPage">1</span>
            <button class="btn btn-secondary" onclick="nextPage()">Next</button>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let selectedId = null;
        // Function to get all data
        const dataPerPage = 10;
        let currentPage = 1;
        let data=[];
        // const getAllData = async () => {
        //     const response = await axios.get('/api/datadiris');
        //     const data = response.data;
        //     const dataList = document.getElementById('data-list');
        //     dataList.innerHTML = `
        //     <table class="table">
        //         <thead>
        //             <tr>
        //                 <th scope="col">Nama</th>
        //                 <th scope="col">NIM</th>
        //                 <th scope="col">Alamat</th>
        //                 <th scope="col">Prodi</th>
        //                 <th scope="col">IPK</th>
        //                 <th scope="col">Semester</th>
        //                 <th scope="col">Actions</th>
        //             </tr>
        //         </thead>
        //         <tbody>
        //             ${data.map(item => `
        //                 <tr>
        //                     <td>${item.nama}</td>
        //                     <td>${item.nim}</td>
        //                     <td>${item.alamat}</td>
        //                     <td>${item.prodi}</td>
        //                     <td>${item.ipk}</td>
        //                     <td>${item.semester}</td>
        //                     <td>
        //                         <button class="btn btn-primary" onclick="editData(${item.id}); showForm();enableEdit(${item.id})">Edit</button>
        //                         <button class="btn btn-info" onclick="getData(${item.id}); showForm()">Lihat</button>
        //                         <button class="btn btn-danger" onclick="deleteData(${item.id})">Delete</button>
        //                     </td>
        //                 </tr>
        //             `).join('')}
        //         </tbody>
        //     </table>`;
        // };
        const getAllData = async () => {
            try {
                const response = await axios.get('/api/datadiris');
                data = response.data;
                console.log(data);
                paginateData(data);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };
        const renderData = (data) => {
            const dataList = document.getElementById('data-list');
            dataList.innerHTML = `
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">IPK</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${data.map(item => `
                            <tr>
                                <td>${item.nama}</td>
                                <td>${item.nim}</td>
                                <td>${item.alamat}</td>
                                <td>${item.prodi}</td>
                                <td>${item.ipk}</td>
                                <td>${item.semester}</td>
                                <td>
                                    <button class="btn btn-primary" onclick="editData(${item.id}); showForm();enableEdit(${item.id})">Edit</button>
                                    <button class="btn btn-info" onclick="getData(${item.id}); showForm()">Lihat</button>
                                    <button class="btn btn-danger" onclick="deleteData(${item.id})">Delete</button>
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>`;
        };
        const paginateData = (data) => {
            const startIndex = (currentPage - 1) * dataPerPage;
            const endIndex = currentPage * dataPerPage;
            const paginatedData = data.slice(startIndex, endIndex);
            renderData(paginatedData);
        }

        const prevPage = () => {
            console.log(data);
            if (currentPage > 1) {
                currentPage--;
                document.getElementById('currentPage').innerText = currentPage;
                paginateData(data);
            }
        }

        const nextPage = () => {
            console.log(data);
            if (currentPage < Math.ceil(data.length / dataPerPage)) {
                currentPage++;
                document.getElementById('currentPage').innerText = currentPage;
                paginateData(data);
            }
        }
        const enableEdit = (id) => {
        const editBtn = document.getElementById('editBtn');
        const submitBtn = document.getElementById('submitBtn');

        if (id) {
            alert('anda akan mengedit data dengan id= '+id);
            editData(id);
            submitBtn.innerText = 'Update';
        } else {
            alert('Pilih data yang akan diubah terlebih dahulu.');
        }
    };

        // Function to get data by ID
        const getData = async (id) => {
            const response = await axios.get(`/api/datadiris/${id}`);
            const data = response.data;
            // Fill form with data
            document.getElementById('nama').value = data.nama;
            document.getElementById('nim').value = data.nim;
            document.getElementById('alamat').value = data.alamat;
            document.getElementById('prodi').value = data.prodi;
            document.getElementById('ipk').value = data.ipk;
            document.getElementById('semester').value = data.semester;
            hideButton('submitBtn');
            hideButton('editBtn');
            const button = document.getElementById('create');
            if (button) {
                button.style.display = 'block';
            }
        };

        // Function to create or update data
        const handleSubmit = async (event) => {
            event.preventDefault();
            const id = 1; // Set your ID here for update, for create set it to null or remove it
            const data = {
                nama: document.getElementById('nama').value,
                nim: document.getElementById('nim').value,
                alamat: document.getElementById('alamat').value,
                prodi: document.getElementById('prodi').value,
                ipk: document.getElementById('ipk').value,
                semester: document.getElementById('semester').value,
            };
            if (selectedId) {
                const response = await axios.put(`/api/datadiris/${selectedId}`, data);
                console.log(response.data);
                selectedId=null;
                submitBtn.innerText = 'Submit';
                document.getElementById('form').reset();
                form.style.display = 'none';
            } else {
                
                const response = await axios.post('/api/datadiris', data);
                console.log(response.data);
                if(response.data=="data nim sudah ada"){
                    const alertDiv = document.getElementById('alert');
                    alertDiv.innerHTML = `<div class="alert alert-danger" role="alert">nim sudah ada</div>`;
                }else{
                    document.getElementById('form').reset();
                    const alertDiv = document.getElementById('alert');
                    alertDiv.innerHTML = '';
                    form.style.display = 'none';
                    showButton('create');
                }
            }
            getAllData();
            // 
        };
        const editData = async (id) => {
            try {
                const response = await axios.get(`/api/datadiris/${id}`);
                if (response && response.data) {
                const data = response.data;

                console.log(data);

                document.getElementById('nama').value = data.nama;
                document.getElementById('nim').value = data.nim;
                document.getElementById('nim').setAttribute('readonly', 'true');
                document.getElementById('alamat').value = data.alamat;
                document.getElementById('prodi').value = data.prodi;
                document.getElementById('ipk').value = data.ipk;
                document.getElementById('semester').value = data.semester;
                selectedId=data.id;
                console.log(selectedId);
                } else {
                console.log("No data found");
                }
            } catch (error) {
                console.error(error);
            }
            };
        // Function to delete data
        const deleteData = async (id) => {
            await axios.delete(`/api/datadiris/${id}`);
            getAllData();
        };
        
        // const submitEdit = async (event) => {
        //     event.preventDefault();
        //     // Implement submit edit functionality here
        //     console.log('Edit submitted');
        // };
        const submitEdit = async (id) => {
        if (id) {
            // Implement submit edit functionality here
            console.log('Edit submitted');
        } else {
            alert('Pilih data yang akan diubah terlebih dahulu.',id);
        }
        };
        const hideButton = (buttonId) => {
        const button = document.getElementById(buttonId);
        if (button) {
            button.style.display = 'none';
        }
        };
        const showButton = (buttonId) => {
        const button = document.getElementById(buttonId);
        if (button) {
            button.style.display = 'block';
        }
        };
        const showForm = () => {
        const form = document.getElementById('form');
        form.style.display = 'block';
        hideButton('create');
        };
        const showForm2 = () => {
        const form = document.getElementById('form');
        form.style.display = 'block';
                document.getElementById('form').reset();
        hideButton('create');
        showButton('submitBtn');
            showButton('editBtn');
        };


        // Initial call to get all data
        getAllData();

        // Add event listener to form submit
        document.getElementById('form').addEventListener('submit', handleSubmit);
    </script>
    
</body>

</html>
