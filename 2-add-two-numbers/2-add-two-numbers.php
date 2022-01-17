/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        
        $preStart = new ListNode(-1);
        $preStartNode = $preStart;
        $carry = 0;
        while(!is_null($l1->val)){
            $l2Val = 0;
            
            if(!is_null($l2->val)){
                $l2Val = $l2->val;
            }
            $sum = $l1->val + $l2Val + $carry;
        
            if($sum >= 10){
                $carry = 1;
                $sum%=10;
            }else{
                $carry = 0;
            }

            $result = new ListNode($sum);
            $preStart->next = $result;
            $l1 = $l1->next;
            $l2 = $l2->next;
            $preStart = $preStart->next;
        }
        
        if(!is_null($l2->val)){
          while(!is_null($l2->val)){
                
                $sum = $l2->val + $carry;
                echo $sum;
                if($sum >= 10){
                    $carry = 1;
                    $sum%=10;
                }else{
                    $carry = 0;
                }

                $result = new ListNode($sum);
                $preStart->next = $result;
                $preStart = $preStart->next;
                $l2 = $l2->next;
                
            }
        }
        
        if($carry){
            $result = new ListNode($carry);
            $preStart->next = $result;
            $preStart = $preStart->next;
        }
        
        $preStartNode = $preStartNode->next;
        return $preStartNode;
    }

}