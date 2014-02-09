//
//  DetailViewController.h
//  Coono
//
//  Created by K on 9/02/14.
//  Copyright (c) 2014 koumei.net. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface DetailViewController : UIViewController <UISplitViewControllerDelegate>

@property (strong, nonatomic) id detailItem;

@property (weak, nonatomic) IBOutlet UILabel *detailDescriptionLabel;
@end
