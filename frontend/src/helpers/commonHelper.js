export function useCommonHelper() {
    function removeEmptyValues(obj) {
        const result = {};
        for (const key in obj) {
            if (obj[key] !== '' && obj[key] !== undefined && obj[key] !== null) {
                result[key] = obj[key];
            }
        }
        return result;
    }

    // function removeLocation() {
    //     this.$storage.removeStorageSync("location")
    // }




    return {
        removeEmptyValues,
        // removeLocation
    }
}