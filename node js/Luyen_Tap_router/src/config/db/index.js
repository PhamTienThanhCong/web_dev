const mongodb = require('mongoose')

async function connect() {
    try {
        await mongodb.connect('mongodb://localhost:27017/test');
        console.log('Done conneted !!!');
    } catch (error) {
        console.log('Fail conneted :((');
    }
}

module.exports = {connect}
