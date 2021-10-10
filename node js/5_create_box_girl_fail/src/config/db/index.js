const mongodb = require('mongoose')

async function connet(){
    try {
        await mongodb.connect('mongodb://localhost:27017/test')
        console.log('Done connetion !!!')
    } catch (error) {
        console.log('Fail connetion :(( ')
    }
}

module.exports = {connet}