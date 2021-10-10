const mongoose = require('mongoose');

async function connet() {
    try {
        await mongoose.connect('mongodb://localhost:27017/Khoa_Hoc')
        console.log('Done Connetion !!!')
    } catch (error) {
        console.log('Fail Connetion :((')
    }
}

module.exports = { connet }
