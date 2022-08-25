class Solution {
public:
    int search(vector<int>& nums, int target) {
        
        int k = 0;
        
        int left = 0, right = nums.size() - 1, middle = 0;
        
        while(left <= right){
            middle = (left + right) / 2;
            
            if(middle != 0 && nums[middle] < nums[middle-1]){
                
                break;
            }
            else if(nums[middle] >= nums[0]){
                left = middle+1;
            }else{
                right = middle-1;
            }
            
        }
   
        
        vector<int>::iterator mi = nums.begin() + middle - 1 ;

        auto index = lower_bound(nums.begin(), mi, target);
        
        int lb = index - nums.begin();
        if(target == nums[lb]){
            return lb;
        }
        
        mi = nums.begin() + middle;
        index = lower_bound(mi, nums.end(), target);
        
        lb = index - nums.begin();
        if(lb < nums.size() && target == nums[lb]){
            return lb;
        }
        
        return -1;
    }
};