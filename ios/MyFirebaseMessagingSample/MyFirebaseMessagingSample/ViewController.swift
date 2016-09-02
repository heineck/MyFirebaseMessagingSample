//
//  ViewController.swift
//  MyFirebaseMessagingSample
//
//  Created by Vinicius Heineck on 02/09/16.
//  Copyright © 2016 Vinicius Heineck. All rights reserved.
//

import UIKit
import Firebase
import FirebaseInstanceID
import FirebaseMessaging

class ViewController: UIViewController {

    @IBOutlet weak var txtDebug: UITextView!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
    }
    
    override func viewWillAppear(animated: Bool) {
        // [START get_iid_token]
        let token = FIRInstanceID.instanceID().token()
        
        if let token = token {
            print("InstanceID token: \(token)")
            self.txtDebug.text = "token: \(token)\n"
        }
        // [END get_iid_token]
        
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}

