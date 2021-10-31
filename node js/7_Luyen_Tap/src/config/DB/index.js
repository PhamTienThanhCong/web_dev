const mongoose = require('mongoose');

async function connet() {
    try {
        await mongoose.connect('mongodb+srv://cong:123@cluster0.gw8w2.mongodb.net/Khoa_Hoc?retryWrites=true&w=majority')
        console.log('Ket Noi Thanh Cong !!!')
    } catch (error) {
        console.log('Ket Noi That Bai :((')
    }
}


module.exports = { connet }